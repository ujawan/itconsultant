<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('pages/index');
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
