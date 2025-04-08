<?php

namespace App\Controllers;
use App\Models\homeModel; // Ensure this is included
use CodeIgniter\Controller;

class Home extends BaseController
{
    protected $homeModel; // Define the property

    public function __construct() {
        $this->homeModel = new homeModel(); // Instantiate the model
    }

    public function index(): string
    {
        $data['records'] = $this->homeModel->getHomeData();
        $data['abouts'] = $this->homeModel->getAboutData();
        $data['features'] = $this->homeModel->getFeatureData();
        $data['services'] = $this->homeModel->getServicesData();
        $data['pricings'] = $this->homeModel->getPricingData();
        $data['quotes'] = $this->homeModel->getQuoteData();
        $data['testimonials'] = $this->homeModel->getTestimonialData();
        $data['teams'] = $this->homeModel->getTeamData();
        $data['brand_logos'] = $this->homeModel->getBrandLogo();
        return view('pages/index', $data);
    }

    public function about(): string
    {
        return view('pages/about');
    }


    public function service(): string
    {
        return view('pages/service');
    }

    public function contact(): string
    {
        return view('pages/contact');
    }

    public function quote(): string
    {
        return view('pages/quote');
    }

}
