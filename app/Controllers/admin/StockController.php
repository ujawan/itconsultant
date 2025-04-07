<?php
namespace App\Controllers\admin;
use App\Controllers\BaseController;
use App\Models\VehicleModel;
use App\Models\VehicleModels;
use App\Models\BodyStyleModel;
use App\Models\ColorTypeModel;
use App\Models\CountriesModel;
use App\Models\VehicleMakeModel;
use App\Models\VehicleFeaturesModel;
use App\Models\VehicleImagesModel;

class StockController extends BaseController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->vehModel       = new VehicleModel();
        $this->vehModels       = new VehicleModels();
        $this->bodyStyleModel = new BodyStyleModel();
        $this->clrTypeModel   = new ColorTypeModel();
        $this->countryModel   = new CountriesModel();
        $this->vehMakeModel   = new VehicleMakeModel();
        $this->vehFeatureModel   = new VehicleFeaturesModel();
        $this->VehicleImagesModel   = new VehicleImagesModel();
        $this->pager = \Config\Services::pager();
        $this->session = session();
    }




    public function get_stock(){


        $page = ($this->request->getGet('page') ?? 1);
        $offset = ($page*100)-100;
        $search = '';


        if ($this->request->getPost('search')) {
            $search = trim($this->request->getPost('search'));
        }


        $data = [
                'stock' => $this->vehModel->like('veh_id',$search)->orLike('stock_no',$search)->orLike('chassis',$search)->orLike('make' ,$search)->orLike('model',$search)->orLike('year',$search)->orderBy('veh_id','DESC')->paginate(100),
                'pager' => $this->vehModel->pager,
                'offset' => $offset,
                'search' => $search
            ];


        if($data['stock']){

        foreach ($data['stock'] as $item) 
            {   
                $updated_item  = $item;
                $updated_item['featured_image'] = $this->get_thumb_link($item['featured_image']);
                $stock_data[] = $updated_item;
            }
            $data['stock'] = $stock_data;
        }



        //echo "<pre>"; print_r($this->vehModel->getLastQuery()->getQuery()); exit;


    return view('admin/stock_list',$data);
    
}




    public function create_stock(){

        $data['bodytype'] = $this->bodyStyleModel->orderBy('BodyStyleID1Name', 'asc')->findAll();

        $data['makes'] = $this->vehMakeModel->where('make_name<>','')->orderBy('make_name', 'asc')->findAll();

        $data['transmission'] = ['4F','5COL','5F','6F','7F','ATM','CATM','CVT'];

        $data['color'] = ['ALPINE WHITE', 'AQUA BLUE', 'ASH', 'ASH BLUE', 'AURORA', 'AZUKI', 'B BLACK', 'BAR GUN RED', 'BEIGE', 'BITTER CHOCOLATE', 'BLACK', 'BLACK SILVER', 'BLACK WHITE', 'BLUE', 'BLUE METALLIC', 'BLUE FLEX', 'BLUE TWO-TONE', 'BLUISH SILVER', 'BORDEAUX', 'Brass Gold Metallic', 'BRILLIANT WHITE PEARL', 'BRILLIANT BLACK CRYSTAL PC', 'BRILLIANT SILVER', 'BRONZE', 'BROWN', 'BROWN PEARL', 'BULE', 'CERAMIC', 'CERAMIC METALLIC', 'CHAMPAGNE', 'CHAMPAGNE GOLD', 'CLEAR BLUE', 'CLEAR STREAM', 'COBALT BLUE', 'CREAM', 'CRYSTAL BLACK', 'CRYSTAL PEARL WHITE', 'CRYSTAL WHITE', 'CRYSTAL STROKE', 'D BLUE', 'D GRAY', 'D GREEN', 'D METAL GRAY', 'DARK METAL GRAY', 'DARK PURPLE', 'DARK RED', 'DARK TURQUOISE', 'DARK BLUE', 'DARK BLUE MICA', 'DARK GRAY', 'DARK GREEN', 'DARK RED WINE', 'DEEP AMETHYST', 'DEEP BLUE', 'DEEP CRYSTAL BLUE', 'DIAMOND BLACK', 'DIAMOND JUICE', 'DIAMOND SILVER', 'DYNAMIC BLUE', 'FRAMBOISE RED', 'GOLD', 'GOLD PEARL', 'GRAY', 'GRAY METALLIC', 'GRAY P', 'GRAY PEARL', 'GRAYISH BLUE', 'GREEN', 'GREEN TWO-TONE', 'GREY', 'GREYISH BLUE', 'GREYISH PURPLE', 'GUN METALLIC', 'GUNMETAL', 'HORIZON TURQUOISE P', 'ICE SILVER', 'IMPERIAL AMBER', 'IVORY', 'JADE GREEN', 'JET BLACK', 'KHAKI', 'KINGFISHER BLUE', 'L BLUE', 'L GREEN', 'LASER BLUE', 'LAVENDER', 'LEAF WHITE', 'LIGHT PINK', 'LIGHT BLUE', 'LIGHT BROWN', 'LIGHT GREEN', 'LIGHT OLIVE', 'LIGHT PURPLE', 'LIGHT ROSE', 'LIGHT YELLOW', 'LIME WHITE PEARL', 'LUMINOUS RED', 'MEDIUM SILVER', 'MET BLACK', 'MILANO RED', 'MINT GREEN TWO', 'MYSTIC BLACK', 'NAVY', 'NAVY BLUE', 'NEON BLUE', 'NIGHT BEIGE', 'OLIVE', 'OLIVE GOLD', 'ORANGE', 'DARK RED WINE', 'PACIFIC BLUE', 'PASSION', 'PEARL', 'PEARL MICA', 'PEARL TWO-TONE', 'PEARL WHITE', 'PERPLE', 'PINK', 'PREMIUM CORONA ORANGE', 'PREMIUM CRYSTAL RED', 'PREMIUM PEARL', 'PREMIUM SILVER', 'PURE BLACK', 'PURPLE', 'PURPLE METALLIC', 'RED', 'RED BLACK', 'ROSE', 'ROSE BRONZE', 'ROSE METALLIC', 'SAPPHIRE BLACK', 'SILVER', 'SILVER META', 'SILVER METALLIC', 'SILVER PEARL', 'SONIC BLUE', 'SONIC SILVER', 'SPARKLING BLACK', 'SPECIFIED', 'SPECIFIED TYPE', 'SPLASH BLUE', 'STEEL BLUE', 'SUPER WHITE', 'SUPER RED', 'SUPERIOR WHITE', 'TEA', 'TEAL BLUE', 'TITANIUM ', 'TITANIUM FLASH MICA', 'TITANIUM GRAY METALLIC', 'TURQUOISE', 'TWILIGHT GRAY', 'Two-tone', 'VIOLET', 'W RED', 'WARM GRAY', 'WARM PEARL TWO-TONE', 'WHITE', 'WHITE LIGHT GRAY', 'WHITE BLACK', 'WHITE II', 'WHITE PEARL', 'WHITE PEARL CRYSTAL', 'WHITE PERL', 'WHTIE', 'WINE', 'WINE RED', 'YELLOW'];        

        return view('admin/stock_create',$data);
    }

    public function store(){
        
        $make_name = $this->vehMakeModel->where('make_id',$this->request->getVar('make'))->findColumn('make_name');    

        $images = $this->request->getPost('images');

        if (!is_array($images)) {
            $images=array();
        }
        $stock_no = $this->request->getVar('stock_no');
        $model_code = $this->request->getVar('model_code');
        $chassis = $this->request->getVar('chassis');
        $engine_no = $this->request->getVar('engine_no');
        $engine_type = $this->request->getVar('engine_type');
        $body_type = $this->request->getVar('body_type');
        $make = $make_name[0];
        $model = $this->request->getVar('model');
        $fuel = $this->request->getVar('fuel');
        $veh_condition = $this->request->getVar('veh_condition');
        $traction = $this->request->getVar('traction');
        $drive = $this->request->getVar('drive');
        $month = $this->request->getVar('month');
        $year = $this->request->getVar('year');
        $doors = $this->request->getVar('doors');
        $seats = $this->request->getVar('seats');
        $cc = $this->request->getVar('cc');
        $mileage = $this->request->getVar('mileage');
        $transmission = $this->request->getVar('transmission');
        $gross_weight = $this->request->getVar('gross_weight');
        $net_weight = $this->request->getVar('net_weight');
        $length = $this->request->getVar('length');
        $width = $this->request->getVar('width');
        $m3 = $this->request->getVar('m3');
        $model_grade = $this->request->getVar('model_grade');
        $exterior_color = $this->request->getVar('exterior_color');
        $interior_color = $this->request->getVar('interior_color');
        $location = $this->request->getVar('location');
        $remarks = $this->request->getVar('remarks');
        $status = $this->request->getVar('status');
        $qty = $this->request->getVar('qty');
        $is_special = $this->request->getVar('is_special');
        $description = $this->request->getVar('description');
        $display_website = $this->request->getVar('display_website');
        $video_file = $this->request->getVar('video_file');
        $catalog_file = $this->request->getVar('catalog_file');
        $youtube_video_link = $this->request->getVar('youtube_video_link');

        
        $feature_img ='';
        if (isset($images[0])) {
            $feature_img = $images[0];
        }
        
        $data = ['stock_no' => $stock_no, 'model_code' => $model_code, 'chassis' => $chassis, 'engine_no' => $engine_no, 'engine_type' => $engine_type, 'body_type' => $body_type, 'make' => $make, 'model' => $model, 'fuel' => $fuel, 'drive' => $drive, 'veh_condition' => $veh_condition, 'traction' => $traction, 'year' => $year, 'month' => $month, 'doors' => $doors, 'seats' => $seats, 'cc' => $cc, 'mileage' => $mileage, 'transmission' => $transmission, 'gross_weight' => $gross_weight, 'net_weight' => $net_weight, 'length' => $length, 'width' => $width, 'height', 'm3' => $m3, 'model_grade' => $model_grade, 'exterior_color' => $exterior_color, 'interior_color' => $interior_color, 'location' => $location, 'remarks' => $remarks, 'status' => $status, 'qty' => $qty, 'is_special' => $is_special, 'description' => $description, 'display_website' => $display_website,'featured_image' => $feature_img, 'youtube_video_link' => $youtube_video_link];



        if ($this->vehModel->insert($data)) {
            
            $veh_id = $this->vehModel->getInsertID();

            foreach($images as $key=>$img ){
                $data2 = [
                    'veh_id'=>$veh_id,
                    'pic_url'=>$img,
                    'pic_priority'=> ($key+1),
                    'web_show' => 1
                ];

                $this->VehicleImagesModel->insert($data2);
            }

            
            $attributes = $this->request->getVar('attributes');
            if($attributes){
                $attributes['veh_id'] = $veh_id;
                $this->vehFeatureModel->insert($attributes);
    
            }
            
            

            $this->session->setTempdata('success', 'Success! Data successfully inserted',5);
        }else{
            $this->session->setTempdata('error', 'Failed! You have some problem',5);
        }



        return redirect()->to(base_url('admin/stock'));

    }

    public function edit($veh_id){

        $res = $this->vehModel->where('veh_id',$veh_id)->first();

        $features = $this->vehFeatureModel->where('veh_id',$veh_id)->first();

        $data['veh'] = $res;

        $data['features'] = $features;

        $data['bodytype'] = $this->bodyStyleModel->orderBy('BodyStyleID1Name', 'asc')->findAll();

        $data['makes'] = $this->vehMakeModel->where('make_name<>','')->orderBy('make_name', 'asc')->findAll();

        $data['models'] = $this->vehModels->where(['model_name<>'=>''])
        ->orderBy('model_name', 'asc')->findColumn('model_name');

        $data['transmission'] = ['4F','5COL','5F','6F','7F','ATM','CATM','CVT'];

        $data['color'] = ['ALPINE WHITE', 'AQUA BLUE', 'ASH', 'ASH BLUE', 'AURORA', 'AZUKI', 'B BLACK', 'BAR GUN RED', 'BEIGE', 'BITTER CHOCOLATE', 'BLACK', 'BLACK SILVER', 'BLACK WHITE', 'BLUE', 'BLUE METALLIC', 'BLUE FLEX', 'BLUE TWO-TONE', 'BLUISH SILVER', 'BORDEAUX', 'Brass Gold Metallic', 'BRILLIANT WHITE PEARL', 'BRILLIANT BLACK CRYSTAL PC', 'BRILLIANT SILVER', 'BRONZE', 'BROWN', 'BROWN PEARL', 'BULE', 'CERAMIC', 'CERAMIC METALLIC', 'CHAMPAGNE', 'CHAMPAGNE GOLD', 'CLEAR BLUE', 'CLEAR STREAM', 'COBALT BLUE', 'CREAM', 'CRYSTAL BLACK', 'CRYSTAL PEARL WHITE', 'CRYSTAL WHITE', 'CRYSTAL STROKE', 'D BLUE', 'D GRAY', 'D GREEN', 'D METAL GRAY', 'DARK METAL GRAY', 'DARK PURPLE', 'DARK RED', 'DARK TURQUOISE', 'DARK BLUE', 'DARK BLUE MICA', 'DARK GRAY', 'DARK GREEN', 'DARK RED WINE', 'DEEP AMETHYST', 'DEEP BLUE', 'DEEP CRYSTAL BLUE', 'DIAMOND BLACK', 'DIAMOND JUICE', 'DIAMOND SILVER', 'DYNAMIC BLUE', 'FRAMBOISE RED', 'GOLD', 'GOLD PEARL', 'GRAY', 'GRAY METALLIC', 'GRAY P', 'GRAY PEARL', 'GRAYISH BLUE', 'GREEN', 'GREEN TWO-TONE', 'GREY', 'GREYISH BLUE', 'GREYISH PURPLE', 'GUN METALLIC', 'GUNMETAL', 'HORIZON TURQUOISE P', 'ICE SILVER', 'IMPERIAL AMBER', 'IVORY', 'JADE GREEN', 'JET BLACK', 'KHAKI', 'KINGFISHER BLUE', 'L BLUE', 'L GREEN', 'LASER BLUE', 'LAVENDER', 'LEAF WHITE', 'LIGHT PINK', 'LIGHT BLUE', 'LIGHT BROWN', 'LIGHT GREEN', 'LIGHT OLIVE', 'LIGHT PURPLE', 'LIGHT ROSE', 'LIGHT YELLOW', 'LIME WHITE PEARL', 'LUMINOUS RED', 'MEDIUM SILVER', 'MET BLACK', 'MILANO RED', 'MINT GREEN TWO', 'MYSTIC BLACK', 'NAVY', 'NAVY BLUE', 'NEON BLUE', 'NIGHT BEIGE', 'OLIVE', 'OLIVE GOLD', 'ORANGE', 'DARK RED WINE', 'PACIFIC BLUE', 'PASSION', 'PEARL', 'PEARL MICA', 'PEARL TWO-TONE', 'PEARL WHITE', 'PERPLE', 'PINK', 'PREMIUM CORONA ORANGE', 'PREMIUM CRYSTAL RED', 'PREMIUM PEARL', 'PREMIUM SILVER', 'PURE BLACK', 'PURPLE', 'PURPLE METALLIC', 'RED', 'RED BLACK', 'ROSE', 'ROSE BRONZE', 'ROSE METALLIC', 'SAPPHIRE BLACK', 'SILVER', 'SILVER META', 'SILVER METALLIC', 'SILVER PEARL', 'SONIC BLUE', 'SONIC SILVER', 'SPARKLING BLACK', 'SPECIFIED', 'SPECIFIED TYPE', 'SPLASH BLUE', 'STEEL BLUE', 'SUPER WHITE', 'SUPER RED', 'SUPERIOR WHITE', 'TEA', 'TEAL BLUE', 'TITANIUM ', 'TITANIUM FLASH MICA', 'TITANIUM GRAY METALLIC', 'TURQUOISE', 'TWILIGHT GRAY', 'Two-tone', 'VIOLET', 'W RED', 'WARM GRAY', 'WARM PEARL TWO-TONE', 'WHITE', 'WHITE LIGHT GRAY', 'WHITE BLACK', 'WHITE II', 'WHITE PEARL', 'WHITE PEARL CRYSTAL', 'WHITE PERL', 'WHTIE', 'WINE', 'WINE RED', 'YELLOW'];

        $data['images'] = $this->VehicleImagesModel->orderBy('pic_priority', 'ASC')->where('veh_id',$veh_id)->findAll();
        

        return view('admin/stock_edit',$data);
    }



    public function update(){


        $make_name = $this->vehMakeModel->where('make_id',$this->request->getVar('make'))->findColumn('make_name');
        $veh_id = $this->request->getVar('veh_id');
        $images = $this->request->getPost('images');

        $db_images = $this->VehicleImagesModel->where('veh_id',$veh_id)->findColumn('pic_url');
        

        if (is_array($images)) {

            $feature_img_status = true;
            foreach($images as $im){
                $filename = explode('/', $im);
                $images2[] = end($filename);

            }
             

            if ($this->VehicleImagesModel->where('veh_id',$veh_id)->delete()) {

    
                if (is_array($db_images)) {
                    
                    foreach($db_images as $db_img){
                        if(!in_array($db_img,$images2)){
                            $folder_thumb = 'public/assets/admin/uploads/stock/thumbs/'.$db_img;
                            $folder_img = 'public/assets/admin/uploads/stock/'.$db_img;
                            @unlink($folder_thumb);
                            @unlink($folder_img);
                        }
                    }
                }

                foreach($images2 as $key=>$img){
                    $data = [
                        'veh_id'=> $veh_id,
                        'pic_url'=> trim($img),
                        'pic_priority'=> ($key+1)
                    ];

                        $this->VehicleImagesModel->insert($data);
                    }
                    
            }

        }else{

            $feature_img_status = false;
            if ($this->VehicleImagesModel->where('veh_id',$veh_id)->delete()) {
                if (is_array($db_images)) {
                    foreach($db_images as $db_img){
                    $folder_thumb = 'public/assets/admin/uploads/stock/thumbs/'.$db_img;
                    $folder_img = 'public/assets/admin/uploads/stock/'.$db_img;
                    @unlink($folder_thumb);
                    @unlink($folder_img);
                }
                }
            }
        }


        if ($feature_img_status == true) {
            $feature_img = $images2[0];
        }else{
            $feature_img ='';
        }
        $stock_no = $this->request->getVar('stock_no');
        $model_code = $this->request->getVar('model_code');
        $chassis = $this->request->getVar('chassis');
        $engine_no = $this->request->getVar('engine_no');
        $engine_type = $this->request->getVar('engine_type');
        $body_type = $this->request->getVar('body_type');
        $make = $make_name[0];
        $model = $this->request->getVar('model');
        $fuel = $this->request->getVar('fuel');
        $veh_condition = $this->request->getVar('veh_condition');
        $traction = $this->request->getVar('traction');
        $drive = $this->request->getVar('drive');
        $month = $this->request->getVar('month');
        $year = $this->request->getVar('year');
        $doors = $this->request->getVar('doors');
        $seats = $this->request->getVar('seats');
        $cc = $this->request->getVar('cc');
        $mileage = $this->request->getVar('mileage');
        $transmission = $this->request->getVar('transmission');
        $gross_weight = $this->request->getVar('gross_weight');
        $net_weight = $this->request->getVar('net_weight');
        $length = $this->request->getVar('length');
        $width = $this->request->getVar('width');
        $m3 = $this->request->getVar('m3');
        $model_grade = $this->request->getVar('model_grade');
        $exterior_color = $this->request->getVar('exterior_color');
        $interior_color = $this->request->getVar('interior_color');
        $location = $this->request->getVar('location');
        $remarks = $this->request->getVar('remarks');
        $status = $this->request->getVar('status');
        $qty = $this->request->getVar('qty');
        $is_special = $this->request->getVar('is_special');
        $description = $this->request->getVar('description');
        $display_website = $this->request->getVar('display_website');
        $youtube_video_link = $this->request->getVar('youtube_video_link');
        $attributes = $this->request->getVar('attributes');
        $data = ['stock_no' => $stock_no, 'model_code' => $model_code, 'chassis' => $chassis, 'engine_no' => $engine_no, 'engine_type' => $engine_type, 'body_type' => $body_type, 'make' => $make, 'model' => $model, 'fuel' => $fuel, 'drive' => $drive, 'veh_condition' => $veh_condition, 'traction' => $traction, 'year' => $year, 'month' => $month, 'doors' => $doors, 'seats' => $seats, 'cc' => $cc, 'mileage' => $mileage, 'transmission' => $transmission, 'gross_weight' => $gross_weight, 'net_weight' => $net_weight, 'length' => $length, 'width' => $width, 'height', 'm3' => $m3, 'model_grade' => $model_grade, 'exterior_color' => $exterior_color, 'interior_color' => $interior_color, 'location' => $location, 'remarks' => $remarks, 'status' => $status, 'qty' => $qty, 'is_special' => $is_special, 'description' => $description, 'display_website' => $display_website,'featured_image' => $feature_img, 'youtube_video_link' => $youtube_video_link];

        if ($this->vehModel->update($veh_id,$data)) {

            if(is_array($attributes)){
                $del_query = "DELETE FROM `tb_vehicle_attributes` WHERE veh_id='$veh_id'";
                if ($this->db->query($del_query)) {
                    $attributes['veh_id'] = $veh_id;
                    $this->vehFeatureModel->insert($attributes);
                    
                    $this->session->setTempdata('success', 'Success! Data successfully updated',5);
                    return redirect()->to(base_url('admin/stock'));
                }else{
                    $this->session->setTempdata('error', 'Failed! You have some problem',5);
                    return redirect()->to(base_url('admin/stock'));
                }
            }else{
                $del_query = "DELETE FROM `tb_vehicle_attributes` WHERE veh_id='$veh_id'";
                if ($this->db->query($del_query)) {
                    $this->session->setTempdata('success', 'Success! Data successfully updated',5);
                    return redirect()->to(base_url('admin/stock'));
                }else{
                    $this->session->setTempdata('error', 'Failed! You have some problem',5);
                    return redirect()->to(base_url('admin/stock'));
                }
            }
        }else{
            $this->session->setTempdata('error', 'Failed! You have some problem',5);
            return redirect()->to(base_url('admin/stock'));
        }
    }



    public function delete($veh_id){
        $query = "DELETE FROM `tbl_vehicles` WHERE veh_id='$veh_id'";
            if ($this->db->query($query)) {
                $db_images = $this->VehicleImagesModel->where('veh_id',$veh_id)->findColumn('pic_url');
                if (is_array($db_images)) {   
                    foreach($db_images as $db_img){
                            $folder_thumb = 'public/assets/admin/uploads/stock/thumbs/'.$db_img;
                            $folder_img = 'public/assets/admin/uploads/stock/'.$db_img;
                            @unlink($folder_thumb);
                            @unlink($folder_img);
                    }
                }
                $del_attr = "DELETE FROM `tb_vehicle_attributes` WHERE veh_id='$veh_id'";
                $del_img = "DELETE FROM `tb_vehicle_pictures` WHERE veh_id='$veh_id'";
                $this->db->query($del_attr);
                $this->db->query($del_img);

                $this->session->setTempdata('delete', 'Success! Data successfully deleted',5);
                return redirect()->to(base_url('admin/stock'));
            }else{
                $this->session->setTempdata('error', 'Failed! You have some problem',5);
                return redirect()->to(base_url('admin/stock'));
            }
    }


    function stock_dealer_delete()
    {
        $data = $this->request->getPost('veh');
        $status = false;
        foreach ($data as $item) 
        {   
            if ($this->vehFeatureModel->where('veh_id',$item)->delete()) {
                if ($this->vehModel->delete($item)) {
                   $status = true; 
                }else{
                    $status = false;
                }
            }

        }
        if ($status == true) {
            $this->session->setTempdata('delete','Success! Data deleted successfully',5);
            return redirect()->to(base_url('admin/stock'));
        }else{
            $this->session->setTempdata('error','Sorry! You have some problem',5);
            return redirect()->to(base_url('admin/stock'));
        }
        
    }

    public function veh_models(){

        $make = $this->request->getPost('make');

        $result = $this->vehModels->where(['make_id' => $make,'model_name<>'=>''])->groupBy('model_name')
        ->orderBy('model_name', 'asc')->findColumn('model_name');

        if ($result) {
            $output = '<option selected="selected" value="">All Models</option>';

                foreach($result as $row)
                {
                    $output .= '<option value="'.$row.'">'.$row.'</option>';
                }
                echo $output;
        }else{
            $output = '<option disabled selected value="">No models found under current selection</option>';
            echo $output;
        }
    }





    public function getAllVehiclesIds(){

        /*$this->response->setHeader('Content-Type', 'application/json');
        return json_encode($result[0]['result']);*/

        $db = db_connect();
        $already_uploaded = $db->query('SELECT group_concat(veh_id) as result FROM tbl_vehicles')->getResultArray();
        

        $url = 'https://senda.us/autocraft/avisnew/page_include/scripts/autohaus_durban_website_stock.php';
        $data = $already_uploaded[0]['result'];
        //$data = "205730,205731,205771,206154,206247";
        //$encodedData = json_encode($data);
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        //curl_setopt( $curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        $result = curl_exec($curl);
        curl_close($curl);
        $vehicles = json_decode($result, true);
        //echo '<pre>'; print_r($result); exit();


        foreach($vehicles as $veh){


            if(count($veh['images'])>2){

                $car = array(
                   'veh_id' => $veh['vehicle_id'], 
                   'stock_no' => "SA-".$veh['vehicle_id'], 
                   'model_code' => $veh['model_code'], 
                   'chassis' => $veh['veh_chassis_model']."-".$veh['veh_chassis_number'],
                   'engine_no' => $veh['veh_engine_number'], 
                   'engine_type' => $veh['veh_engine_type'], 
                   'body_type' => $veh['body_type'], 
                   'make' => $veh['make_name'], 
                   'model' => $veh['model_name'],
                   'fuel' => $veh['veh_fuel'],
                   'traction' => $veh['veh_traction'],
                   'drive' => $veh['veh_drive'],
                   'veh_condition' => $veh['veh_condition'],
                   'year' => $veh['veh_year'],
                   'month' => $veh['manu_month'],
                   'doors' => $veh['veh_door'],
                   'seats' => $veh['veh_passenger'],
                   'cc' => $veh['veh_cc'],
                   'mileage' => $veh['veh_km'],
                   'transmission' => $veh['veh_t_m'],
                   'gross_weight' => $veh['veh_gross_weight'],
                   'net_weight' => $veh['veh_net_weight'],
                   'length' => $veh['veh_l'],
                   'width' => $veh['veh_w'],
                   'height' => $veh['veh_h'],
                   'm3' => $veh['veh_m3'],
                   'model_grade' => $veh['lookupitem_id_grade'],
                   'exterior_color' => $veh['veh_color'],
                   'interior_color' => $veh['veh_interior_color'],
                   'avis_price' => $veh['veh_sale_price'],
                   'fob_price' => $veh['veh_sale_price'],
                   'status' => 'AVAILABLE',
                   'display_website' => '1',
                   'featured_image' => $veh['images'][0],
                   'added_on' => date("Y-m-d H:i:s"),
                   'updated_on' => date("Y-m-d H:i:s")
                 );

                $this->vehModel->insert($car);

                foreach($veh['images'] as $key=>$img ){
                    $images = [
                        'veh_id'=>$veh['vehicle_id'],
                        'pic_url'=>$img,
                        'pic_priority'=>$key+1
                    ];
                    $this->VehicleImagesModel->insert($images);
                    
                }

                $att_arr = array();
                foreach( $veh['options'] as $key => $val ){

                    if($key != 'vehicle_id' ) {
                        if($veh['options'][$key] == 1){ $veh['options'][$key] = 'YES';}else{ $veh['options'][$key] = '';}
                    }

                    $att_arr = array(
                           'veh_id' => $veh['options']['vehicle_id'], 
                           'AC' => $veh['options']['veh_a_c'], 
                           'POWER_STEERING' => $veh['options']['veh_p_s'], 
                           'ABS' => $veh['options']['veh_abs'], 
                           'SRS' => $veh['options']['veh_srs'], 
                           'REAR_SPOILER' => $veh['options']['veh_r_spoiler'], 
                           'ROOF_RAIL' => $veh['options']['veh_roof_rail'], 
                           'CD' => $veh['options']['veh_cd'], 
                           'TV' => $veh['options']['veh_tv'], 
                           'NAVIGATION' => $veh['options']['veh_navigation'], 
                           'ALLOY_WHEEL' => $veh['options']['veh_a_w'], 
                           'LEATHER_SEATS' => $veh['options']['veh_leather_seats'], 
                           'BACKTYRE' => $veh['options']['veh_back_tyre'], 
                           'RADIO' => $veh['options']['veh_radio'], 
                           'CENTRAL_LOCKING' => $veh['options']['veh_central_locking'], 
                           'POWER_MIRROR' => $veh['options']['power_mirror'], 
                           'BACK_CAMERA' => $veh['options']['back_camera'], 
                           'FRONT_CAMERA' => $veh['options']['front_camera'], 
                           'SUN_ROOF' => $veh['options']['sun_roof'], 
                           'DVD_Player' => $veh['options']['dvd_player'], 
                           'MD_Player' => $veh['options']['md_player'], 
                           'FOG_Lights' => $veh['options']['fog_lights'], 
                           'Body_Kit' => $veh['options']['body_kit'], 
                           'Turbo' => $veh['options']['turbo'], 
                           'One_Owner' => $veh['options']['one_owner'], 
                           'HID' => $veh['options']['hid'], 
                           'POWER_SLIDE_DOOR' => $veh['options']['power_slide_door'], 
                           'CORNER_SENSOR' => $veh['options']['corner_sensor'], 
                           'STEERING_SWITCH' => $veh['options']['steering_switch'], 
                           'AUTO_AC' => $veh['options']['auto_ac'], 
                           'half_leather_seat' => $veh['options']['half_leather_seat'], 
                           'seven_seater' => $veh['options']['seven_seater'], 
                           'paddle_shift' => $veh['options']['paddle_shift'], 
                           'double_power_slide_door' => $veh['options']['double_slide_door'], 
                           'key_start' => $veh['options']['key_start'], 
                           'double_moonroof' => $veh['options']['double_moonroof'], 
                           'maker_navi_tv' => $veh['options']['maker_navi_tv'], 
                           'dealer_navi_tv' => $veh['options']['dealer_navi_tv'], 
                           'maker_navi_jbl_sound_system' => $veh['options']['maker_navi_jbl_sound_system'], 
                           'front_side_back_camera' => $veh['options']['front_side_back_camera'], 
                           'around_view_4_camera' => $veh['options']['around_view_4_camera'], 
                           'maker_rear_entertainment' => $veh['options']['maker_rear_entertainment'], 
                           'alpine_rear_entertainment' => $veh['options']['alpine_rear_entertainment'], 
                           'rear_entertainment_premium_sound' => $veh['options']['push_start'], 
                           'coolbox' => $veh['options']['coolbox'], 
                           'black_interior' => $veh['options']['black_interior'], 
                           'black_half_leather' => $veh['options']['black_half_leather'], 
                           'black_full_leather' => $veh['options']['black_full_leather'], 
                           'beige_interior' => $veh['options']['beige_interior'], 
                           'beige_half_leather' => $veh['options']['beige_half_leather'], 
                           'beige_full_leather' => $veh['options']['beige_full_leather'], 
                           'eight_seater' => $veh['options']['eight_seater'], 
                           'one_power_seat' => $veh['options']['one_power_seat'], 
                           'two_power_seat' => $veh['options']['two_power_seat'], 
                           'three_power_seat' => $veh['options']['three_power_seat'], 
                           'power_boot' => $veh['options']['power_boot'], 
                           'modelista_front_spoiler' => $veh['options']['modelista_front_spoiler'], 
                           'modelista_full_body_kit' => $veh['options']['modelista_full_body_kit'], 
                           'admiration_front_spoiler' => $veh['options']['admiration_front_spoiler'], 
                           'admiration_full_body_kit' => $veh['options']['admiration_full_body_kit'], 
                           'after_market_front_spoiler' => $veh['options']['after_market_front_spoiler'], 
                           'after_market_full_body_kit' => $veh['options']['after_market_full_body_kit'], 
                           'maker_alloy_wheels' => $veh['options']['maker_alloy_wheels'], 
                           'after_market_alloy_wheels' => $veh['options']['after_market_alloy_wheels'], 
                           'four_disc_brake' => $veh['options']['four_disc_brake'], 
                           'difflock' => $veh['options']['difflock'], 
                           'spare_key' => $veh['options']['spare_key']
                         );

                    }

                    $this->vehFeatureModel->insert($att_arr);

            } 
               
        }

     }





}
