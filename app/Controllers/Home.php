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
