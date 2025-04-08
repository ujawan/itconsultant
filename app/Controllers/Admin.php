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

        return view('admin/login');
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
    public function services(): string|RedirectResponse
    {
        if (!$this->checkLogin()) {
            return redirect()->to('admin/login');
        }
        
        return view('admin/services/index');
    }

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

    // Team Management
    public function team(): string|RedirectResponse
    {
        if (!$this->checkLogin()) {
            return redirect()->to('admin/login');
        }
        return view('admin/team/index');
    }

    public function newTeamMember(): string|RedirectResponse
    {
        if (!$this->checkLogin()) {
            return redirect()->to('admin/login');
        }
        return view('admin/team/new');
    }

    // Testimonials Management
    public function testimonials(): string|RedirectResponse
    {
        if (!$this->checkLogin()) {
            return redirect()->to('admin/login');
        }
        return view('admin/testimonials/index');
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
        'feature_heading' => $this->request->getPost('heroHeading') ?? $record['feature_heading'],
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





}
   

