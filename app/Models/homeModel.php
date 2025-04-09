<?php

namespace App\Models;

use CodeIgniter\Model;

class homeModel extends Model
{
    protected $table = 'home'; // Replace with your actual table name
    protected $primaryKey = 'home_id'; // Replace with your actual primary key
    protected $allowedFields = ['bkimg_1', 'bkimg_2','hero_small_heading', 'hero_heading', 'happy_clients', 'happy_clients_text', 'projects_done', 'projects_done_text', 'win_awards', 'win_awards_text'];

    public function getHomeData()
    {
        return $this->findAll();
    }

    public function getAboutData()
    {
        return $this->db->table('about')->get()->getResultArray();
    }

    public function getFeatureData()
    {
        return $this->db->table('features')->get()->getResultArray();
    }
    public function getServicesData()
    {
        return $this->db->table('services')->get()->getResultArray();
    }
    public function getPricingData()
    {
        return $this->db->table('pricing')->get()->getResultArray();
    }
    public function getQuoteData()
    {
        return $this->db->table('quote')->get()->getResultArray();
    }
    public function getTestimonialsData()
    {
        return $this->db->table('testimonial')->get()->getResultArray();
    }
    public function getTeamData()
    {
        return $this->db->table('team')->get()->getResultArray();
    }
    public function getBrandLogo()
    {
        return $this->db->table('brand_logo')->get()->getResultArray();
    }

    public function updateHome($id, $data)
    {
        return $this->db->table('home')->where('home_id', $id)->update($data);
    }
    public function updateAbout($id, $data)
    {
        return $this->db->table('about')->where('about_id', $id)->update($data);
    }
    public function updateFeature($id, $data)
    {
        return $this->db->table('features')->where('feature_id', $id)->update($data);
    }
    public function updateServices($id, $data)
    {
        return $this->db->table('services')->where('service_id', $id)->update($data);
    }
    public function updateQuote($id, $data)
    {
        return $this->db->table('quote')->where('quote_id', $id)->update($data);
    }
    public function updatePricing($id, $data)
    {
        return $this->db->table('pricing')->where('pricing_id', $id)->update($data);
    }
    public function updateTestimonials($id, $data)
    {
        return $this->db->table('testimonial')->where('testimonial_id', $id)->update($data);
    }
    public function updateTeam($id, $data)
    {
        return $this->db->table('team')->where('team_id', $id)->update($data);
    }
    public function updateBrand($id, $data)
    {
        return $this->db->table('brand_logo')->where('brand_id', $id)->update($data);
    }

    public function getMenuData()
    {
        return $this->db->table('menu')
                        ->orderBy('order_num', 'ASC')
                        ->get()
                        ->getResultArray();
    }

}