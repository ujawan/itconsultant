<?php
namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\CountriesModel;
use App\Models\TestimonialModel;
use App\Models\InquiriesModel;
use App\Models\VehicleModel;
use App\Models\SubscriptionModel;
use App\Models\VehicleMakeModel;
use App\Models\VehicleModels;
use App\Models\MessagesModel;
use App\Models\AuthModel;

class AdminController extends BaseController
{
    public function __construct(){
        $this->session = session();
        $this->auth = new AuthModel();
        $this->validation = \Config\Services::validation();
        $this->db = \Config\Database::connect();
        $this->CountriesModel = new CountriesModel();
        $this->TestimonialModel = new TestimonialModel();
        $this->InquiriesModel = new InquiriesModel();
        $this->vehModel = new VehicleModel();
        $this->subscribe = new SubscriptionModel();
        $this->VehMake = new VehicleMakeModel();
        $this->VehModels = new VehicleModels();
        $this->msgs = new MessagesModel();
        $this->pager = \Config\Services::pager();
    }

    public function index()
    {   
        return view('admin/dashboard');
    }

    public function profile(){
        
        return view('admin/profile.php');
    }
    
    public function profile_update(){
        $rules = [
            'current_password' => 'required',
            'new_password' => 'required',
            'conf_password' => 'required|matches[new_password]',
        ];

        $msgs = [
            'conf_password' => [
                'matches' => 'Password not match'
            ]
        ];

        if(!$this->validate($rules, $msgs)){
            $valid = ['validation' => $this->validator];
            return view('admin/profile',$valid);
        }else{
            $email = $this->request->getPost('email');
            $new_password = $this->request->getPost('new_password');
            $current_password = $this->request->getPost('current_password');
            $data = $this->auth->where('email',$email)->findColumn('password');
            $current_db_passwrod =  $data[0];
            if (password_verify($current_password,$current_db_passwrod)) {
                $user_id = $this->session->get('user_id');
                $data = [
                    'password' => password_hash($new_password, PASSWORD_DEFAULT)
                ];
                if ($this->auth->update($user_id,$data)) {
                    $this->session->setFlashdata('success','Success! Password updated');
                    return redirect()->to(base_url('admin/profile'));
                }else{
                    echo 'not update';
                }
            }else{
                $this->session->setFlashdata('current_password','Please enter correct current password');
                return redirect()->to(base_url('admin/profile'));
            }


        }

    }

    // messages
    public function messages(){
            $page = ($this->request->getGet('page') ?? 1);
            $offset = ($page*10)-10;
        if ($this->request->getMethod()=='post') {
            $search = trim($this->request->getPost('search'));
            $data = [
                'result' => $this->msgs->where('email',$search)->paginate(10),
                'pager' => $this->msgs->pager,
                'offset' => $offset
            ];
            return view('admin/messages',$data);
        }else{
            $data = [
                'result' => $this->msgs->paginate(10),
                'pager' => $this->msgs->pager,
                'offset' => $offset
            ];
            return view('admin/messages',$data);
        }
    }
    public function messages_delete($del_id){
        if ($this->msgs->delete($del_id)) {
            return redirect()->to(base_url('admin/messages'));
        }else{
            return redirect()->to(base_url('admin/messages'));
        }
    }

    // vehicle models
    public function vehicle_model(){

        $page = ($this->request->getGet('page') ?? 1);
        $offset = ($page*100)-100;
        if ($this->request->getMethod(true) === 'POST') {
            $search = trim($this->request->getPost('search'));
            $data = [
                'result' => $this->VehModels->join('tbl_vehicle_make','tbl_vehicle_make.make_id = tbl_vehicle_model.make_id')->where('model_name',$search)->paginate(100),
                'pager' => $this->VehModels->pager,
            ];
           
        }else{
            $data = [
                'result' => $this->VehModels->join('tbl_vehicle_make','tbl_vehicle_make.make_id = tbl_vehicle_model.make_id')->where('model_name<>','')->paginate(100),
                'pager' => $this->VehModels->pager,
                'offset' => $offset,
            ];
        }
        return view('admin/vehicle_model',$data);

        
    }
    public function vehicle_model_create(){
        $data['make'] = $this->VehMake->findAll();
        return view('admin/vehicle_model-create',$data);
    }

    public function vehicle_model_store(){
        $model_name = $this->request->getPost('model_name');
        $make_id = $this->request->getPost('make_id');

        $data = [
            'model_name' => $model_name,
            'make_id' => $make_id
        ];


        if ($this->VehModels->insert($data)) {
            $this->session->setFlashdata('success','Success! Data inserted successfully');
        }else{
            $this->session->setFlashdata('error','Failed! You have some problem');
            
        }
        return redirect()->to(base_url('admin/vehicle/model'));
    }

    public function vehicle_model_edit($edit_id){
        $data['edit'] = $this->VehModels->where('model_id',$edit_id)->first();
        $data['make'] = $this->VehMake->findAll();
        return view('admin/vehicle_model-edit',$data);
    }
    public function vehicle_model_update(){
        $model_id = $this->request->getPost('model_id');
        $model_name = $this->request->getPost('model_name');
        $make_id = $this->request->getPost('make_id');

        $data = [
            'model_name' => $model_name,
            'make_id' => $make_id
        ];
        if ($this->VehModels->update($model_id,$data)) {
            $this->session->setFlashdata('success','Success! Data updated successfully');
            return redirect()->to(base_url('admin/vehicle/model'));
        }else{
            $this->session->setFlashdata('error','Failed! You have some problem');
            return redirect()->to(base_url('admin/vehicle/model'));
        }
    }
    public function vehicle_model_delete($del_id){
        if ($this->VehModels->delete($del_id)) {
            $this->session->setFlashdata('success','Success! Data deleted successfully');
            return redirect()->to(base_url('admin/vehicle/model'));
        }else{
            $this->session->setFlashdata('error','Failed! You have some problem');
            return redirect()->to(base_url('admin/vehicle/model'));
        }
    }



    // Vehicle Data
    public function vehicle_make(){
            $page = ($this->request->getGet('page') ?? 1);

            $offset = ($page*50)-50;

            if ($this->request->getMethod(true) === 'POST') {

            $search = trim($this->request->getPost('search'));
            // $res['result'] = $this->VehMake->where('make_name',$search)->findAll();
            $data = [
                'result' => $this->VehMake->where('make_name',$search)->paginate(50),
                'pager' => $this->VehMake->pager,
                'offset' => $offset,
            ];
            return view('admin/vehicle_make',$data);
        }else{
            $data = [
                'result' => $this->VehMake->orderBy('make_name', 'asc')->paginate(50),
                'pager' => $this->VehMake->pager,
                'offset' => $offset,
            ];
            return view('admin/vehicle_make',$data);
        }
        
    }

    public function vehicle_make_create(){
        return view('admin/vehicle_make_create');
    }
    public function vehicle_make_store(){
        $make_name = $this->request->getPost('make_name');

        if ($this->VehMake->insert(['make_name'=> $make_name])) {
            $this->session->setFlashdata('success','Success! Data inserted successfully');
            return redirect()->to(base_url('admin/vehicle/make'));
        }else{
            $this->session->setFlashdata('error','Failed! You have some problem');
            return redirect()->to(base_url('admin/vehicle/make'));
        }
    }
    public function vehicle_make_delete($del_id){

        if ($this->VehMake->delete($del_id)) {
            $this->session->setFlashdata('success','Success! Data deleted successfully');
            return redirect()->to(base_url('admin/vehicle/make'));
        }else{
            $this->session->setFlashdata('error','Failed! You have some problem');
            return redirect()->to(base_url('admin/vehicle/make'));
        }
    }
    public function vehicle_make_edit($edit_id){
        $data['edit'] = $this->VehMake->find($edit_id);
        return view('admin/vehicle_make_edit',$data);
    }
    public function vehicle_make_update(){
        $make_id = $this->request->getPost('make_id');
        $make_name = $this->request->getPost('make_name');

        if ($this->VehMake->update($make_id,['make_name' => $make_name])) {
            $this->session->setFlashdata('success','Success! Data updated successfully');
            return redirect()->to(base_url('admin/vehicle/make'));
        }else{
            $this->session->setFlashdata('error','Failed! You have some problem');
            return redirect()->to(base_url('admin/vehicle/make'));
        }
    }



    // subscribers
    public function subscribers(){
        if ($this->request->getMethod()=='post') {
            $search = trim($this->request->getPost('search'));
            // $res['result'] = $this->VehMake->where('make_name',$search)->findAll();
            $data = [
                'subscribers' => $this->subscribe->where('email',$search)->paginate(10),
                'pager' => $this->subscribe->pager,
            ];
            return view('admin/subscriber',$data);
        }else{
            $data = [
                'subscribers' => $this->subscribe->paginate(10),
                'pager' => $this->subscribe->pager,
            ];
            return view('admin/subscriber',$data);
        }
    }
    public function subscribers_del($del_id){
        $res = $this->subscribe->delete($del_id);
        if ($res) {
            $this->session->setFlashdata('success','Success! Data deleted successfully');
            return redirect()->to(base_url('admin/subscribers'));
        }else{
            $this->session->setFlashdata('error','Failed! You have some problem');
            return redirect()->to(base_url('admin/subscribers'));
        }
    }


    // INQUIRIES
    public function inquiries(){
        $records =array();
        $data = array();
        $result = $this->InquiriesModel->findAll();

        if($result){

            foreach($result as $res){
                $records = $res;
                $veh_data = $this->vehModel->where('veh_id',$res['veh_id'])->findAll();
                if($veh_data){
                    $slug = strtolower(str_replace(" ", "-", $veh_data[0]['make']."-".$veh_data[0]['model']."-".$veh_data[0]['year']."-".$veh_data[0]['veh_id']));
                    $records['slug'] = base_url('car')."/".$slug;
                }
                $data[] = $records;
            }
        }

        $rec['data'] = $data;

        return view('admin/inquiries',$rec);
    }



    public function inquiries_delete($id){

        if ($this->InquiriesModel->delete($id)) {
            $this->session->setTempdata('success','Data successfully deleted',5);
            return redirect()->to(base_url('admin/inquiries'));
        }else{
            $this->session->setTempdata('error','You have some problem',5);
            return redirect()->to(base_url('admin/inquiries'));
        }
    }


    // TESTIMONIAL's
    public function testimonial(){
        $builder = $this->db->table('tbl_testimonials');
        if ($this->request->getMethod()=='post') {
            $search = trim($this->request->getPost('search'));

            $data['result'] = $builder->like('testimonial_by', $search, 'both')
            ->orLike('testimonial_country', $search, 'both')->get()->getResultArray();
            return view('admin/testimonial',$data);
        }


        $data['result'] = $this->TestimonialModel->findAll();
        return view('admin/testimonial',$data);
    }
    public function create_testimonial(){
        $countries['countries_list'] = $this->CountriesModel->where('country_name<>','')->orderBy('country_name','ASC')->findAll();

        return view('admin/create_testimonial',$countries);
    }
    public function store_testimonial(){

        $file = $this->request->getFile('file');

         $data['getName'] =$file->getName();
         $data['getTempName'] =$file->getTempName();
         $data['getClientName'] =$file->getClientName();
         $data['getRandomName'] =$file->getRandomName();
         $data['getBaseName'] =$file->getBaseName();
         $data['getFileName'] =$file->getFileName();
         $data['getPathName'] =$file->getPathName();
         $data['getName'] =$file->getName();
         $data['getName'] =$file->getName();
         $data['getSize'] =$file->getSize();
         $data['guessExtension'] =$file->guessExtension();

         $imgName = $file->getClientName();
         
        if ($file->isValid()) {
            // $file->store();
            $file->move('public/assets/admin/uploads/testimonials',$imgName);
        }else{
            
        }

        $data = [
            'testimonial_by' => $this->request->getVar('testimonial_by'),
            'testimonial_desc' => $this->request->getVar('testimonial_text'),
            'testimonial_visibility' => $this->request->getVar('testimonial_visibility'),
            'testimonial_image' => $imgName
        ];

        if ($this->TestimonialModel->insert($data)) {
            $this->session->setTempdata('success','Success! Data successfully inserted',5);
            return redirect()->to('admin/testimonial');
        }else{
            $this->session->setTempdata('error','Failed! You have some problem',5);
            return redirect()->to('admin/testimonial');
        }
        
    }

    public function edit_testimonial($id){
        $data['edit'] = $this->TestimonialModel->where('testimonial_id',$id)->first();
        $data['countries_list'] = $this->CountriesModel->where('country_name<>','')->orderBy('country_name','ASC')->findAll();
        return view('admin/testimonial_edit',$data);
    }
    public function update(){
        $old_img = $this->request->getPost('old_img');
        $file = $this->request->getFile('file');
        $imgName = $file->getClientName();
        if ($file->isValid()) {
            if ($old_img != '') {
                unlink('public/assets/admin/uploads/testimonials/'.$old_img);
            }
            $file->move('public/assets/admin/uploads/testimonials',$imgName);
            $data = [
            'testimonial_desc' => $this->request->getPost('testimonial_desc'),
            'testimonial_by' => $this->request->getPost('testimonial_by'),
            'testimonial_image' => $imgName,
            'testimonial_visibility' => $this->request->getPost('testimonial_visibility')
        ];

        }else{
            $data = [
            'testimonial_desc' => $this->request->getPost('testimonial_desc'),
            'testimonial_by' => $this->request->getPost('testimonial_by'),
            'testimonial_visibility' => $this->request->getPost('testimonial_visibility')
        ];
        }

        $id = $this->request->getPost('testimonial_id');
        
        if ($this->TestimonialModel->update($id,$data)) {
            $this->session->setTempdata('success','Success! Data successfully inserted',5);
            return redirect()->to('admin/testimonial');
        }else{
            $this->session->setTempdata('error','Failed! You have some problem',5);
            return redirect()->to('admin/testimonial');
        }
    }

    public function delete($id){
        if ($this->TestimonialModel->delete($id)) {
            $this->session->setTempdata('success','Success! Data successfully deleted',5);
            return redirect()->to('admin/testimonial');
        }else{
            $this->session->setTempdata('error','Failed! You have some problem',5);
            return redirect()->to('admin/testimonial');
        }
    }


}