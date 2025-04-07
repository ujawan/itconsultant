<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RedirectResponse;

class Admin extends BaseController
{
    private $adminCredentials = [
        'username' => 'admin',
        'password' => 'admin123'
    ];

    public function __construct()
    {
        helper(['form', 'url']);
    }

    private function checkLogin(): bool
    {
        if (!session()->get('isAdminLoggedIn')) {
            return false;
        }
        return true;
    }

    public function index()
    {
        if (!$this->session->get('isAdminLoggedIn')) {
            return redirect()->to(base_url('admin/login'));
        }
        return view('admin/dashboard');
    }

    public function login(): string|RedirectResponse
    {
        // If already logged in, redirect to dashboard
        if (session()->get('isAdminLoggedIn')) {
            return redirect()->to('admin/dashboard');
        }

        if ($this->request->getMethod() === 'POST') {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            if ($username === $this->adminCredentials['username'] && 
                $password === $this->adminCredentials['password']) {
                
                session()->set([
                    'isAdminLoggedIn' => true,
                    'adminUsername' => $username
                ]);

                return redirect()->to('admin/dashboard');
            }

            session()->setFlashdata('error', 'Invalid username or password');
            return redirect()->back();
        }

        return view('admin/login');
    }

    public function dashboard(): string|RedirectResponse
    {
        if (!session()->get('isAdminLoggedIn')) {
            return redirect()->to('admin/login');
        }

        // Get counts for dashboard stats
        return view('admin/dashboard', [
            'stats' => [
                'services' => 12,
                'posts' => 45,
                'team' => 8,
                'testimonials' => 24
            ]
        ]);
    }

    public function logout(): RedirectResponse
    {
        session()->destroy();
        return redirect()->to('admin/login')->with('message', 'Successfully logged out');
    }

    // Services Management
    public function services(): string|RedirectResponse
    {
        if (!$this->checkLogin()) {
            return redirect()->to('admin/login');
        }
        return view('admin/services/index');
    }

    public function newService(): string|RedirectResponse
    {
        if (!$this->checkLogin()) {
            return redirect()->to('admin/login');
        }
        return view('admin/services/new');
    }

    // Blog Management
    public function blog(): string|RedirectResponse
    {
        if (!$this->checkLogin()) {
            return redirect()->to('admin/login');
        }
        return view('admin/blog/index');
    }

    public function newPost(): string|RedirectResponse
    {
        if (!$this->checkLogin()) {
            return redirect()->to('admin/login');
        }
        return view('admin/blog/new');
    }

    // Team Management
    public function team(): string|RedirectResponse
    {
        if (!$this->checkLogin()) {
            return redirect()->to('admin/login');
        }
        return view('admin/team/index');
    }

    public function newTeamMember(): string|RedirectResponse
    {
        if (!$this->checkLogin()) {
            return redirect()->to('admin/login');
        }
        return view('admin/team/new');
    }

    // Testimonials Management
    public function testimonials(): string|RedirectResponse
    {
        if (!$this->checkLogin()) {
            return redirect()->to('admin/login');
        }
        return view('admin/testimonials/index');
    }

    public function newTestimonial(): string|RedirectResponse
    {
        if (!$this->checkLogin()) {
            return redirect()->to('admin/login');
        }
        return view('admin/testimonials/new');
    }

    // Settings
    public function settings(): string|RedirectResponse
    {
        if (!$this->checkLogin()) {
            return redirect()->to('admin/login');
        }
        return view('admin/settings');
    }
}
