<?php

namespace App\Controllers;
use App\Models\homeModel;
use CodeIgniter\Controller;

class Home extends BaseController
{
    protected $homeModel;
    protected $data;  // Add this line to store shared data

    public function __construct() 
    {
        $this->homeModel = new homeModel();
        
        $this->data['headerAddress'] = $this->homeModel->getHeaderAddress();
        $this->data['footer'] = $this->homeModel->getFooterData();
        $this->data['headerlogo'] = $this->homeModel->getHeaderLogo();
    }

    public function index(): string
    {
        $data = $this->data;  // Merge with shared data
        $data['records'] = $this->homeModel->getHomeData();
        $data['abouts'] = $this->homeModel->getAboutData();
        $data['features'] = $this->homeModel->getFeatureData();
        $data['services'] = $this->homeModel->getServicesData();
        $data['pricings'] = $this->homeModel->getPricingData();
        $data['quotes'] = $this->homeModel->getQuoteData();
        $data['testimonials'] = $this->homeModel->getTestimonialsData();
        $data['teams'] = $this->homeModel->getTeamData();
        $data['brand_logos'] = $this->homeModel->getBrandLogo();
        return view('pages/index', $data);
    }

    public function about(): string
    {
        $data = $this->data;  // Merge with shared data
        $data['records'] = $this->homeModel->getHomeData();
        $data['abouts'] = $this->homeModel->getAboutData();
        $data['teams'] = $this->homeModel->getTeamData();
        $data['brand_logos'] = $this->homeModel->getBrandLogo();
        return view('pages/about', $data);
    }

    public function service(): string
    {
        $data = $this->data;  // Merge with shared data
        $data['records'] = $this->homeModel->getHomeData();
        $data['services'] = $this->homeModel->getServicesData();
        $data['testimonials'] = $this->homeModel->getTestimonialsData();
        $data['brand_logos'] = $this->homeModel->getBrandLogo();
        return view('pages/service', $data);
    }
    public function contact(): string
    {  
        $data = $this->data;
        $data['contacts'] = $this->homeModel->getContactData();
        $data['brand_logos'] = $this->homeModel->getBrandLogo();
        return view('pages/contact', $data);  // Pass shared data
    }

   
}