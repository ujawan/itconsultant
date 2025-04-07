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





class VehicleImportController extends BaseController
{

    public function __construct(){

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
    



    public function index()
    {
        $db = db_connect();
        $already_uploaded = $db->query('SELECT group_concat(veh_id) as result FROM tbl_vehicles')->getResultArray();
        $url = 'http://senda.us/autocraft/avisnew/page_include/scripts/autohaus_korea_website_stock.php';
        $data = $already_uploaded[0]['result'];
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        $result = curl_exec($curl);
        curl_close($curl);
        $vehicles = json_decode($result, true);
    
        // Delete existing stock, images, and features before importing new data
        $this->VehicleImagesModel->where('veh_id >', 0)->delete();
        $this->vehFeatureModel->where('veh_id >', 0)->delete();
        $this->vehModel->where('veh_id >', 0)->delete();
    
        foreach ($vehicles as $item) 
        {   
            // if(count($item['images']) > 0){
                $updated_item = [
                    'veh_id'           => $item['vehicle_id'],
                    'stock_no'         => "SA-".$item['vehicle_id'],
                    'chassis'          => $item['veh_chassis_model']."-".$item['veh_chassis_number'],
                    'engine_no'        => $item['veh_engine_number'],
                    'engine_type'      => $item['veh_engine_type'],
                    'body_type'        => $item['body_type'],
                    'model'            => $item['model_name'],
                    'make'             => $item['make_name'],
                    'year'             => $item['veh_year'],
                    'fuel'             => $item['veh_fuel'],
                    'traction'         => $item['veh_traction'],
                    'drive'            => $item['veh_drive'],
                    'month'            => $item['lookupitem_id_veh_manufactured_month'],
                    'status'           => 'AVAILABLE',
                    'doors'            => $item['veh_door'],
                    'seats'            => $item['veh_passenger'],
                    'cc'               => $item['veh_cc'],
                    'mileage'          => $item['veh_km'],
                    'transmission'     => $item['veh_t_m'],
                    'gross_weight'     => $item['veh_gross_weight'],
                    'net_weight'       => $item['veh_net_weight'],
                    'length'           => $item['veh_l'],
                    'width'            => $item['veh_w'],
                    'height'           => $item['veh_h'],
                    'm3'               => $item['veh_m3'],
                    'model_grade'      => $item['lookupitem_id_grade'],
                    'exterior_color'   => $item['veh_color'],
                    'display_website'  => '1',
                    'added_on'         => date("Y-m-d H:i:s"),
                    'updated_on'       => date("Y-m-d H:i:s"),
                    'featured_image'   => isset($item['images'][0]) ? $item['images'][0] : null
                ];

                // echo "<pre>"; print_r($updated_item); echo "</pre>"; exit;
    
                // Insert new vehicle record
                $this->vehModel->insert($updated_item);
    
                // Insert Images
                foreach($item['images'] as $key => $img) {
                    $images = [
                        'veh_id' => $item['vehicle_id'],
                        'pic_url' => $img,
                        'pic_priority' => $key+1
                    ];
                    $this->VehicleImagesModel->insert($images);
                }
    
                // Insert Features
                $att_arr = [];
                foreach($item['options'] as $key => $val) {
                    $att_arr = [
                        'veh_id' => $item['vehicle_id'], 
                        'AC' => $item['options']['veh_a_c'] ?? '',
                        'POWER_STEERING' => $item['options']['veh_p_s'] ?? '',
                        'ABS' => $item['options']['veh_abs'] ?? '',
                        'SRS' => $item['options']['veh_srs'] ?? '',
                        'REAR_SPOILER' => $item['options']['veh_r_spoiler'] ?? '',
                        'ROOF_RAIL' => $item['options']['veh_roof_rail'] ?? '',
                        'CD' => $item['options']['veh_cd'] ?? '',
                        'TV' => $item['options']['veh_tv'] ?? '',
                        'NAVIGATION' => $item['options']['veh_navigation'] ?? '',
                        'ALLOY_WHEEL' => $item['options']['veh_a_w'] ?? '',
                        'LEATHER_SEATS' => $item['options']['veh_leather_seats'] ?? '',
                        'BACKTYRE' => $item['options']['veh_back_tyre'] ?? '',
                        'RADIO' => $item['options']['veh_radio'] ?? '',
                        'CENTRAL_LOCKING' => $item['options']['veh_central_locking'] ?? '',
                        'POWER_MIRROR' => $item['options']['power_mirror'] ?? '',
                        'BACK_CAMERA' => $item['options']['back_camera'] ?? '',
                        'FRONT_CAMERA' => $item['options']['front_camera'] ?? '',
                        'SUN_ROOF' => $item['options']['sun_roof'] ?? '',
                        'DVD_Player' => $item['options']['dvd_player'] ?? '',
                        'MD_Player' => $item['options']['md_player'] ?? '',
                        'FOG_Lights' => $item['options']['fog_lights'] ?? '',
                        'Body_Kit' => $item['options']['body_kit'] ?? '',
                        'Turbo' => $item['options']['turbo'] ?? '',
                        'One_Owner' => $item['options']['one_owner'] ?? '',
                        'HID' => $item['options']['hid'] ?? '',
                        'POWER_SLIDE_DOOR' => $item['options']['power_slide_door'] ?? '',
                        'CORNER_SENSOR' => $item['options']['corner_sensor'] ?? '',
                        'STEERING_SWITCH' => $item['options']['steering_switch'] ?? '',
                        'AUTO_AC' => $item['options']['auto_ac'] ?? '',
                        'half_leather_seat' => $item['options']['half_leather_seat'] ?? '',
                        'seven_seater' => $item['options']['seven_seater'] ?? '',
                        'paddle_shift' => $item['options']['paddle_shift'] ?? '',
                        'double_power_slide_door' => $item['options']['double_slide_door'] ?? '',
                        'key_start' => $item['options']['key_start'] ?? '',
                        'double_moonroof' => $item['options']['double_moonroof'] ?? '',
                        'maker_navi_tv' => $item['options']['maker_navi_tv'] ?? '',
                        'dealer_navi_tv' => $item['options']['dealer_navi_tv'] ?? '',
                        'maker_navi_jbl_sound_system' => $item['options']['maker_navi_jbl_sound_system'] ?? '',
                        'front_side_back_camera' => $item['options']['front_side_back_camera'] ?? '',
                        'around_view_4_camera' => $item['options']['around_view_4_camera'] ?? '',
                        'maker_rear_entertainment' => $item['options']['maker_rear_entertainment'] ?? '',
                        'alpine_rear_entertainment' => $item['options']['alpine_rear_entertainment'] ?? '',
                        'rear_entertainment_premium_sound' => $item['options']['push_start'] ?? '',
                        'coolbox' => $item['options']['coolbox'] ?? '',
                        'black_interior' => $item['options']['black_interior'] ?? '',
                        'black_half_leather' => $item['options']['black_half_leather'] ?? '',
                        'black_full_leather' => $item['options']['black_full_leather'] ?? '',
                        'beige_interior' => $item['options']['beige_interior'] ?? '',
                        'beige_half_leather' => $item['options']['beige_half_leather'] ?? '',
                        'beige_full_leather' => $item['options']['beige_full_leather'] ?? '',
                        'eight_seater' => $item['options']['eight_seater'] ?? '',
                        'one_power_seat' => $item['options']['one_power_seat'] ?? '',
                        'two_power_seat' => $item['options']['two_power_seat'] ?? '',
                        'three_power_seat' => $item['options']['three_power_seat'] ?? '',
                        'power_boot' => $item['options']['power_boot'] ?? '',
                        'modelista_front_spoiler' => $item['options']['modelista_front_spoiler'] ?? '',
                        'modelista_full_body_kit' => $item['options']['modelista_full_body_kit'] ?? '',
                        'admiration_front_spoiler' => $item['options']['admiration_front_spoiler'] ?? '',
                        'admiration_full_body_kit' => $item['options']['admiration_full_body_kit'] ?? '',
                        'after_market_front_spoiler' => $item['options']['after_market_front_spoiler'] ?? '',
                        'after_market_full_body_kit' => $item['options']['after_market_full_body_kit'] ?? '',
                        'maker_alloy_wheels' => $item['options']['maker_alloy_wheels'] ?? '',
                        'after_market_alloy_wheels' => $item['options']['after_market_alloy_wheels'] ?? '',
                        'four_disc_brake' => $item['options']['four_disc_brake'] ?? '',
                        'difflock' => $item['options']['difflock'] ?? '',
                        'spare_key' => $item['options']['spare_key'] ?? ''
                    ];
                    
                // }
                $this->vehFeatureModel->insert($att_arr);
            }
        }
    
        // Set success message and redirect
        $this->session->setFlashdata('message', 'Vehicle stock imported successfully');
        return redirect()->to('admin/dashboard');
    }
    
    






}