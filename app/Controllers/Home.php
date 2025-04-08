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

    public function blog(): string
    {
        return view('pages/blog');
    }

    public function contact(): string
    {
        return view('pages/contact');
    }

    public function quote(): string
    {
        return view('pages/quote');
    }

    public function team(): string
    {
        return view('pages/team');
    }

    public function testimonial(): string
    {
        return view('pages/testimonial');
    }

    public function feature(): string
    {
        return view('pages/feature');
    }

    public function detail($id = null): string
    {
        return view('pages/detail', ['id' => $id]);
    }
}
