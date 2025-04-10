<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RedirectResponse;
use App\Models\homeModel; // Ensure this is included
use CodeIgniter\Controller;

class Admin extends BaseController
{
    private $adminCredentials = [
        'username' => 'admin',
        'password' => 'admin123'
    ];

    public function __construct()
    {
        helper(['form', 'url']);
        $this->homeModel = new homeModel();
        
    }

    private function checkLogin(): bool
    {
        if (!session()->get('isAdminLoggedIn')) {
            return false;
        }
        return true;
    }

    public function index()
    {
        if (!$this->session->get('isAdminLoggedIn')) {
            return redirect()->to(base_url('admin/login'));
        }
        return view('admin/dashboard');
    }

    public function login(): string|RedirectResponse
    {
        // If already logged in, redirect to dashboard
        if (session()->get('isAdminLoggedIn')) {
            return redirect()->to('admin/dashboard');
        }

        if ($this->request->getMethod() === 'POST') {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            if ($username === $this->adminCredentials['username'] && 
                $password === $this->adminCredentials['password']) {
                
                session()->set([
                    'isAdminLoggedIn' => true,
                    'adminUsername' => $username
                ]);

                return redirect()->to('admin/dashboard');
            }

            session()->setFlashdata('error', 'Invalid username or password');
            return redirect()->back();
        }
        $this->homeModel = new homeModel();
        $data['footer'] = $this->homeModel->getFooterData();

        return view('admin/login', $data);
    }

    public function dashboard(): string|RedirectResponse
    {
        if (!session()->get('isAdminLoggedIn')) {
            return redirect()->to('admin/login');
        }

        // Get counts for dashboard stats
        return view('admin/dashboard', [
            'stats' => [
                'services' => 12,
                'posts' => 45,
                'team' => 8,
                'testimonials' => 24
            ]
        ]);
    }

    public function logout(): RedirectResponse
    {
        session()->destroy();
        return redirect()->to('admin/login')->with('message', 'Successfully logged out');
    }

    // Services Management
    

    public function newService(): string|RedirectResponse
    {
        if (!$this->checkLogin()) {
            return redirect()->to('admin/login');
        }
        return view('admin/services/new');
    }

    // Blog Management
    public function blog(): string|RedirectResponse
    {
        if (!$this->checkLogin()) {
            return redirect()->to('admin/login');
        }
        return view('admin/blog/index');
    }

    public function newPost(): string|RedirectResponse
    {
        if (!$this->checkLogin()) {
            return redirect()->to('admin/login');
        }
        return view('admin/blog/new');
    }

  

    public function newTestimonial(): string|RedirectResponse
    {
        if (!$this->checkLogin()) {
            return redirect()->to('admin/login');
        }
        return view('admin/testimonials/new');
    }

    // Settings
    public function settings(): string|RedirectResponse
    {
        if (!$this->checkLogin()) {
            return redirect()->to('admin/login');
        }
        return view('admin/settings');
    }

    public function home(): string|RedirectResponse
    {
        if (!$this->checkLogin()) {
            return redirect()->to('admin/login');
        }
        $this->homeModel = new homeModel(); // Instantiate the model

        $data['records'] = $this->homeModel->getHomeData();
        return view('admin/home', $data);
    }

    public function updateHome($id)

    {
        $homeModel = new homeModel();

        $record = $homeModel->find($id);
     
        $newName1 = $record['bkimg_1']; // Default to old image
        $file1 = $this->request->getFile('background1');
        if ($file1->isValid() && ! $file1->hasMoved()) {
            if (file_exists(base_url('assets/img') . $newName1)) {
                unlink(base_url('assets/img') . $newName1);
            }
            $newName1 = $file1->getRandomName();
            $file1->move('assets/img', $newName1);
        }

        $newName2 = $record['bkimg_2']; // Default to old image
        $file2 = $this->request->getFile('background2');
        if ($file2->isValid() && ! $file2->hasMoved()) {
            if (file_exists(base_url('assets/img') . $newName2)) {
                unlink(base_url('assets/img') . $newName2);
            }
            $newName2 = $file2->getRandomName();
            $file2->move('assets/img', $newName2);
        }


        $heroHeading = $this->request->getPost('hero_small_heading');
        $heroText = $this->request->getPost('hero_heading');
       

        $data = [
            'bkimg_1' => $newName1,
            'bkimg_2' => $newName2,
            'hero_small_heading' => $heroHeading,
            'hero_heading' => $heroText,
            'happy_clients_text' => $this->request->getPost('happy_clients_text'),
            'happy_clients' => $this->request->getPost('happy_clients'),
            'projects_done_text' => $this->request->getPost('projects_done_text'),
            'projects_done' => $this->request->getPost('projects_done'),
            'win_awards_text' => $this->request->getPost('win_awards_text'),
            'win_awards' => $this->request->getPost('win_awards'),
            'services_heading' => $this->request->getPost('services_heading'),
            'pricing_heading' => $this->request->getPost('pricing_heading'),
            'testimonial_heading' => $this->request->getPost('testimonial_heading'),
            'team_heading' => $this->request->getPost('team_heading'),
            
            
        ];

        $homeModel->updateHome($id, $data);
        return redirect()->to('/admin');
    }
    public function about(): string|RedirectResponse
    {
        if (!$this->checkLogin()) {
            return redirect()->to('admin/login');
        }
        $this->homeModel = new homeModel(); // Instantiate the model

        $data['abouts'] = $this->homeModel->getAboutData();
        return view('admin/about', $data);
    }

    public function updateAbout($id)
{
   

    $homeModel = new homeModel();
    $db = \Config\Database::connect();

    // Get existing record
    $about = $db->table('about')->where('about_id', $id)->get()->getRowArray();
    
    

    $newName4 = $about['about_img'];
   
    // Default to old image
    $file4 = $this->request->getFile('aboutImage');
    if ($file4->isValid() && ! $file4->hasMoved()) {
        if (file_exists(base_url('assets/img') . $newName4)) {
            unlink(base_url('assets/img') . $newName4);
        }
        $newName4 = $file4->getRandomName();
        $file4->move('assets/img', $newName4);
    }

    // Get all form data including the existing image
    $data = [
        'about_img' => $newName4, // Use existing image if no new one is uploaded
        'about_heading' => $this->request->getPost('aboutHeading') ?? $record['about_heading'],
        'about_text' => $this->request->getPost('aboutText') ?? $record['about_text'],
        'about_check1' => $this->request->getPost('aboutCheck1') ?? $record['about_check1'],
        'about_check2' => $this->request->getPost('aboutCheck2') ?? $record['about_check2'],
        'about_check3' => $this->request->getPost('aboutCheck3') ?? $record['about_check3'],
        'about_check4' => $this->request->getPost('aboutCheck4') ?? $record['about_check4'],
        'about_phone_text' => $this->request->getPost('aboutPhoneText') ?? $record['about_phone_text'],
        'about_phone' => $this->request->getPost('aboutPhone') ?? $record['about_phone']
    ];


    // Update the record
    $homeModel->updateAbout($id, $data);
    return redirect()->to('/admin');
}

public function whychooseus(): string|RedirectResponse
{
    if (!$this->checkLogin()) {
        return redirect()->to('admin/login');
    }
    $this->homeModel = new homeModel(); // Instantiate the model

    $data['whychooseus'] = $this->homeModel->getFeatureData();
    return view('admin/whychooseus', $data);
}


public function updateWhyChooseUs($id)
{
    $homeModel = new homeModel();
    $db = \Config\Database::connect();

    // Get existing record
    $record = $db->table('features')->where('feature_id', $id)->get()->getRowArray();
    $featureImage = $record['feature_img']; // Default to old image

    // Handle feature image upload
    $file1 = $this->request->getFile('featureImage');
    if ($file1->isValid() && ! $file1->hasMoved()) {
        // Delete old image if it exists
        if (file_exists(base_url('assets/img') . $featureImage)) {
            unlink(base_url('assets/img') . $featureImage);
        }
        // Save new image
        $newFeatureImage1 = $file1->getRandomName();
        $file1->move('assets/img', $newFeatureImage1);
    } else {
        // Keep existing image if no new image was uploaded
        $newFeatureImage1 = $featureImage;
    }

    // Get all form data
    $data = [
        'feature_heading' => $this->request->getPost('featureHeading') ?? $record['feature_heading'],
        'feature_name' => $this->request->getPost('featureName') ?? $record['feature_name'],
        'feature_detail' => $this->request->getPost('featureDetail') ?? $record['feature_detail'],
        'feature_name2' => $this->request->getPost('featureName2') ?? $record['feature_name2'],
        'feature_detail2' => $this->request->getPost('featureDetail2') ?? $record['feature_detail2'],
        'feature_img' => $newFeatureImage1,
        'feature_name3' => $this->request->getPost('featureName3') ?? $record['feature_name3'],
        'feature_detail3' => $this->request->getPost('featureDetail3') ?? $record['feature_detail3'],
        'feature_name4' => $this->request->getPost('featureName4') ?? $record['feature_name4'],
        'feature_detail4' => $this->request->getPost('featureDetail4') ?? $record['feature_detail4']
    ];

    // Update the record in features table
    $db->table('features')->where('feature_id', $id)->update($data);
    return redirect()->to('/admin');
}

public function ourServices(): string|RedirectResponse
{
    if (!$this->checkLogin()) {
        return redirect()->to('admin/login');
    }
    $this->homeModel = new homeModel(); // Instantiate the model

    $data['services'] = $this->homeModel->getServicesData();
    return view('admin/ourservices', $data);
}

public function services()
{
    if (!$this->checkLogin()) {
        return redirect()->to('admin/login');
    }
    $data['services'] = $this->homeModel->getServicesData();
    return view('admin/ourservices', $data);
}

public function addService()
{
    $data = [
        'service_name' => $this->request->getPost('serviceName'),
        'service_text' => $this->request->getPost('serviceDetail')
    ];
    
    $this->homeModel->addService($data);
    return redirect()->to('admin/ourservices');
}

public function updateService($id)
{
    $data = [
        'service_name' => $this->request->getPost('serviceName'),
        'service_text' => $this->request->getPost('serviceDetail')
    ];
    
    $this->homeModel->updateService($id, $data);
    return redirect()->to('admin/ourservices');
}

public function deleteService($id)
{
    $this->homeModel->deleteService($id);
    return redirect()->to('admin/ourservices');
}
public function quote()
{
    if (!$this->checkLogin()) {
        return redirect()->to('admin/login');
    }
    $data['quotes'] = $this->homeModel->getQuoteData();
    return view('admin/quote', $data);
}




public function updateQuote($id)
{
    $this->homeModel = new homeModel();

    $data = [
        'quote_heading' => $this->request->getPost('quote_heading'),
        'quote_check1' => $this->request->getPost('quote_check1'),
        'quote_check2' => $this->request->getPost('quote_check2'),
        'quote_text' => $this->request->getPost('quote_text'),
        'quote_phone_heading' => $this->request->getPost('quote_phone_heading'),
        'quote_phone' => $this->request->getPost('quote_phone')
    ];

    $this->homeModel->updateQuote($id, $data);
    return redirect()->to('/admin');
}

public function pricing(): string|RedirectResponse
{
    if (!$this->checkLogin()) {
        return redirect()->to('admin/login');
    }
    
    $this->homeModel = new homeModel(); // Instantiate the model
    
    $data['prices'] = $this->homeModel->getPricingData();
    return view('admin/pricing', $data);
}

public function addPricing()
{
    $data = [
        'pricing_plan' => $this->request->getPost('pricing_plan'),
        'pricing_text' => $this->request->getPost('pricing_text'),
        'price' => $this->request->getPost('price'),
        'pricing_check1' => $this->request->getPost('pricing_check1'),
        'pricing_check2' => $this->request->getPost('pricing_check2'),
        'pricing_check3' => $this->request->getPost('pricing_check3'),
        'pricing_check4' => $this->request->getPost('pricing_check4')
    ];
    
    $this->homeModel->addPricing($data);
    return redirect()->to('admin/pricing');
}

public function updatePricing($id)
{
    $data = [
        'pricing_plan' => $this->request->getPost('pricing_plan'),
        'pricing_text' => $this->request->getPost('pricing_text'),
        'price' => $this->request->getPost('price'),
        'pricing_check1' => $this->request->getPost('pricing_check1'),
        'pricing_check2' => $this->request->getPost('pricing_check2'),
        'pricing_check3' => $this->request->getPost('pricing_check3'),
        'pricing_check4' => $this->request->getPost('pricing_check4')
    ];
    
    $this->homeModel->updatePricing($id, $data);
    return redirect()->to('admin/pricing');
}

public function deletePricing($id)
{
    $this->homeModel->deletePricing($id);
    return redirect()->to('admin/pricing');
}

public function Testimonials(): string|RedirectResponse
{
    if (!$this->checkLogin()) {
        return redirect()->to('admin/login');
    }
    $this->homeModel = new homeModel();

    $data['testimonials'] = $this->homeModel->getTestimonialsData();
    return view('admin/testimonials', $data);
}


public function addTestimonial()
{
    $img = $this->request->getFile('testimonial_img');
    $newName = $img->getRandomName();
    $img->move('assets/img', $newName);

    $data = [
        'client_name' => $this->request->getPost('client_name'),
        'client_position' => $this->request->getPost('client_position'),
        'detail' => $this->request->getPost('detail'),
        'testimonial_img' => $newName
    ];
    
    $this->homeModel->addTestimonial($data);
    return redirect()->to('admin/testimonials');
}

public function updateTestimonial($id)
{
    $data = [
        'client_name' => $this->request->getPost('client_name'),
        'client_position' => $this->request->getPost('client_position'),
        'detail' => $this->request->getPost('detail')

    ];

    if ($img = $this->request->getFile('testimonial_img')) {
        if ($img->isValid() && !$img->hasMoved()) {
            $newName = $img->getRandomName();
            $img->move('assets/img', $newName);
            $data['testimonial_img'] = $newName;
        }
    }
    
    $this->homeModel->updateTestimonial($id, $data);
    return redirect()->to('admin/testimonials');
}

public function deleteTestimonial($id)
{
    $this->homeModel->deleteTestimonial($id);
    return redirect()->to('admin/testimonials');
}


/*public function updateTestimonials($id)
{
    $this->homeModel = new homeModel();
    $db = \Config\Database::connect();

    // Get existing record
    $record = $db->table('testimonial')->where('testimonial_id', $id)->get()->getRowArray();
    
    // Handle image upload
    $file = $this->request->getFile('testimonial_img');
    
    // Initialize image name with existing image
    $imageName = $record['testimonial_img'];
    
    // Only process if new image is uploaded
    if ($file && $file->isValid() && !$file->hasMoved()) {
        // Delete old image if exists
        if ($imageName && file_exists('assets/img/' . $imageName)) {
            unlink('assets/img/' . $imageName);
        }
        $imageName = $file->getRandomName();
        $file->move('assets/img', $imageName);
    }
    
    $data = [
        'client_name' => $this->request->getPost('client_name'),
        'client_position' => $this->request->getPost('client_position'),
        'detail' => $this->request->getPost('detail'),
        'testimonial_img' => $imageName
    ];

    $this->homeModel->updateTestimonials($id, $data);
    return redirect()->to('/admin/testimonials');
}
*/
public function Team(): string|RedirectResponse
{
    if (!$this->checkLogin()) {
        return redirect()->to('admin/login');
    }
    $this->homeModel = new homeModel(); // Instantiate the model

    $data['teams'] = $this->homeModel->getTeamData();
    return view('admin/team', $data);
}
public function addTeam()
{
    $img = $this->request->getFile('team_img');
    $newName = $img->getRandomName();
    $img->move('assets/img', $newName);

    $data = [
        'name' => $this->request->getPost('team_name'),
        'designation' => $this->request->getPost('team_position'),
        'team_img' => $newName,
        'team_twitter' => $this->request->getPost('team_twitter'),
        'team_facebook' => $this->request->getPost('team_facebook'),
        'team_insta' => $this->request->getPost('team_insta'),
        'team_linkedin' => $this->request->getPost('team_linkedin')
    ];
    
    $this->homeModel->addTeam($data);
    return redirect()->to('admin/team');
}

public function updateTeam($id)
{
    $team = $this->homeModel->getTeam($id);
    
    $data = [
        'name' => $this->request->getPost('team_name'),
        'designation' => $this->request->getPost('team_position'),
        'team_twitter' => $this->request->getPost('team_twitter'),
        'team_facebook' => $this->request->getPost('team_facebook'),
        'team_insta' => $this->request->getPost('team_insta'),
        'team_linkedin' => $this->request->getPost('team_linkedin')
    ];

    if ($img = $this->request->getFile('team_img')) {
        if ($img->isValid() && !$img->hasMoved()) {
            // Delete old image
            if ($team['team_img'] && file_exists('assets/img/' . $team['team_img'])) {
                unlink('assets/img/' . $team['team_img']);
            }
            
            // Upload new image
            $newName = $img->getRandomName();
            $img->move('assets/img', $newName);
            $data['team_img'] = $newName;
        }
    }
    
    $this->homeModel->updateTeam($id, $data);
    return redirect()->to('admin/team');
}

public function deleteTeam($id)
{
    $team = $this->homeModel->getTeam($id);
    
    // Delete image file
    if ($team['team_img'] && file_exists('assets/img/' . $team['team_img'])) {
        unlink('assets/img/' . $team['team_img']);
    }
    
    $this->homeModel->deleteTeam($id);
    return redirect()->to('admin/team');
}

/*public function updateTeam($id)
{
    $this->homeModel = new homeModel();
    $db = \Config\Database::connect();

    // Get existing record
    $record = $db->table('team')->where('team_id', $id)->get()->getRowArray();
    
    // Initialize image name with existing image
    $imageName = $record['team_img'];
    
    // Handle image upload
    $file = $this->request->getFile('team_img');
    if ($file && $file->isValid() && !$file->hasMoved()) {
        // Delete old image if exists
        if ($imageName && file_exists('assets/img/' . $imageName)) {
            unlink('assets/img/' . $imageName);
        }
        $imageName = $file->getRandomName();
        $file->move('assets/img', $imageName);
    }
    
    $data = [
        'name' => $this->request->getPost('team_name'),
        'designation' => $this->request->getPost('team_position'),
        'team_img' => $imageName,
        'team_twitter' => $this->request->getPost('team_twitter'),
        'team_facebook' => $this->request->getPost('team_facebook'),
        'team_insta' => $this->request->getPost('team_insta'),
        'team_linkedin' => $this->request->getPost('team_linkedin')
    ];

    $this->homeModel->updateTeam($id, $data);
    return redirect()->to('/admin/team');
}
*/

public function brand(): string|RedirectResponse
{
    if (!$this->checkLogin()) {
        return redirect()->to('admin/login');
    }
    $this->homeModel = new homeModel(); // Instantiate the model

    $data['brands'] = $this->homeModel->getBrandLogo();
    return view('admin/brand', $data);
}

public function addBrand()
{
    $img = $this->request->getFile('brand_logo');
    if ($img->isValid() && !$img->hasMoved()) {
        $newName = $img->getRandomName();
        $img->move('assets/img', $newName);
        
        $data = ['brand_logo' => $newName];
        $this->homeModel->addBrand($data);
    }
    
    return redirect()->to('admin/brand');
}

public function updateBrand($id)
{
    $brand = $this->homeModel->getBrand($id);
    
    if ($img = $this->request->getFile('brand_logo')) {
        if ($img->isValid() && !$img->hasMoved()) {
            // Delete old image
            if ($brand['brand_logo'] && file_exists('assets/img/' . $brand['brand_logo'])) {
                unlink('assets/img/' . $brand['brand_logo']);
            }
            
            // Upload new image
            $newName = $img->getRandomName();
            $img->move('assets/img', $newName);
            
            $data = ['brand_logo' => $newName];
            $this->homeModel->updateBrand($id, $data);
        }
    }
    
    return redirect()->to('admin/brand');
}

public function deleteBrand($id)
{
    $brand = $this->homeModel->getBrand($id);
    
    // Delete image file
    if ($brand['brand_logo'] && file_exists('assets/img/' . $brand['brand_logo'])) {
        unlink('assets/img/' . $brand['brand_logo']);
    }
    
    $this->homeModel->deleteBrand($id);
    return redirect()->to('admin/brand');
}

/*public function updateBrand($id)
{
    $this->homeModel = new homeModel();
    
    // Handle image upload
    $img = $this->request->getFile('brand_logo'); // Changed from brand_img to brand_logo
    if ($img && $img->isValid() && !$img->hasMoved()) {
        $newName = $img->getRandomName();
        $img->move('assets/img', $newName);
        
        $data = [
            'brand_logo' => $newName  // Changed from brand_img to brand_logo
        ];
        
        $this->homeModel->updateBrand($id, $data);
    }
    
    return redirect()->to('/admin');  // Changed to redirect back to brand page
}
*/

public function menu(): string|RedirectResponse
{
    if (!$this->checkLogin()) {
        return redirect()->to('admin/login');
    }
    $this->homeModel = new homeModel(); // Instantiate the model

    $data['menus'] = $this->homeModel->getMenuData();
    return view('admin/menu', $data);
}
public function addMenu()
{
    $data = [
        'menu_name' => $this->request->getPost('menu_name'),
        'url' => str_replace(' ', '-', strtolower($this->request->getPost('url'))), // Convert spaces to hyphens
        'order_num' => $this->request->getPost('order_num')
    ];
    
    $this->homeModel->addMenu($data);
    return redirect()->to('admin/menu');
}

public function updateMenu($id)
{
    $data = [
        'menu_name' => $this->request->getPost('menu_name'),
        'url' => str_replace(' ', '-', strtolower($this->request->getPost('url'))), // Convert spaces to hyphens
        'order_num' => $this->request->getPost('order_num')
    ];
    
    $this->homeModel->updateMenu($id, $data);
    return redirect()->to('admin/menu');
}

public function deleteMenu($id)
{
    $this->homeModel->deleteMenu($id);
    return redirect()->to('admin/menu');
}

public function headerAddress(): string|RedirectResponse
{
    if (!$this->checkLogin()) {
        return redirect()->to('/admin/login');
    }

    $data['headerAddress'] = $this->homeModel->getHeaderAddress();
    return view('admin/headeraddress', $data);
}

public function updateHeaderAddress()
{
    if (!$this->checkLogin()) {
        return redirect()->to('/admin/login');
    }

    $data = [
        'header_address' => $this->request->getPost('header_address'),
        'header_phone' => $this->request->getPost('header_phone'),
        'header_email' => $this->request->getPost('header_email'),
        'twitter_url' => $this->request->getPost('twitter_url'),
        'facebook_url' => $this->request->getPost('facebook_url'),
        'linkedin_url' => $this->request->getPost('linkedin_url'),
        'instagram_url' => $this->request->getPost('instagram_url'),
        'youtube_url' => $this->request->getPost('youtube_url')
    ];

    $this->homeModel->updateHeaderAddress($data);
    return redirect()->to('admin')->with('success', 'Header Address updated successfully');
}

public function contact(): string|RedirectResponse
{
    if (!$this->checkLogin()) {
        return redirect()->to('admin/login');
    }
    $this->homeModel = new homeModel(); // Instantiate the model

    $data['contact'] = $this->homeModel->getContactData();
    return view('admin/contact', $data);
}

public function updateContact($id)
{
    $data = [
        'heading' => $this->request->getPost('heading'),
        'phone_heading' => $this->request->getPost('phone_heading'),
        'phone' => $this->request->getPost('phone'),
        'email_heading' => $this->request->getPost('email_heading'),
        'email' => $this->request->getPost('email'),
        'address_heading' => $this->request->getPost('address_heading'),
        'address' => $this->request->getPost('address')
    ];

    $this->homeModel->updateContactData($data);
    return redirect()->to('admin')->with('success', 'Contact Information updated successfully');
}

public function footer()
{
    if (!$this->checkLogin()) {
        return redirect()->to('admin/login');
    }
    $this->homeModel = new homeModel();
    $data['footer'] = $this->homeModel->getFooterData();
    return view('admin/footer', $data);
}

public function updateFooterData($id)
{
    $data = [
        'footer_text' => $this->request->getPost('footer_text')
    ];

    // Handle logo upload
    $logo = $this->request->getFile('footer_logo');
    if ($logo->isValid() && !$logo->hasMoved()) {
        $newName = $logo->getRandomName();
        
        // Move file to uploads directory
        $logo->move('assets/img', $newName);
        
        // Add logo filename to data array
        $data['footer_logo'] = $newName;

        // Delete old logo if exists
        $oldLogo = $this->homeModel->getFooterData()['footer_logo'] ?? '';
        if ($oldLogo && file_exists(FCPATH . 'assets/img/' . $oldLogo)) {
            unlink(FCPATH . 'assets/img/' . $oldLogo);
        }
    }

    $this->homeModel->updateFooterData($data);
    return redirect()->to('admin')->with('success', 'Footer updated successfully');
}

public function headerLogo()
{
    if (!$this->checkLogin()) {
        return redirect()->to('admin/login');
    }
    $this->homeModel = new homeModel();
    $data['headerlogo'] = $this->homeModel->getHeaderLogo();
    return view('admin/headerlogo', $data);
}

public function updateHeaderLogo($id)
{
    if (!$this->checkLogin()) {
        return redirect()->to('admin/login');
    }

    $data = [];
    $logo = $this->request->getFile('logo_image');
    
    if ($logo && $logo->isValid() && !$logo->hasMoved()) {
        $newName = $logo->getRandomName();
        
        // Create directory if it doesn't exist
        if (!is_dir('assets/img')) {
            mkdir('assets/img', 0777, true);
        }
        
        // Move file
        if ($logo->move('assets/img', $newName)) {
            $data['logo_image'] = $newName;
            
            // Delete old logo
            $oldLogo = $this->homeModel->getHeaderLogo()['logo_image'] ?? '';
            if ($oldLogo && file_exists(FCPATH . 'assets/img/' . $oldLogo)) {
                unlink(FCPATH . 'assets/img/' . $oldLogo);
            }
        }
    }
    
    if (!empty($data)) {
        $this->homeModel->updateHeaderLogo(1, $data);
        return redirect()->to('admin')->with('success', 'Header Logo updated successfully');
    }
    
    return redirect()->to('admin')->with('error', 'No file was uploaded or an error occurred');
}
}
   
