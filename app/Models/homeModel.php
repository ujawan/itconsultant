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
}