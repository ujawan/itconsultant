<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Admin Routes
$routes->group('admin', static function($routes) {
    // Authentication
    $routes->match(['GET', 'POST'], 'login', 'Admin::login');
    $routes->get('logout', 'Admin::logout');
    
    // Dashboard
    $routes->get('dashboard', 'Admin::dashboard');
    $routes->get('/', 'Admin::dashboard');
    
    // Services Management
    $routes->get('services', 'Admin::services');
    $routes->get('services/new', 'Admin::newService');
    $routes->post('services/create', 'Admin::createService');
    
    // Blog Management
    $routes->get('blog', 'Admin::blog');
    $routes->get('blog/new', 'Admin::newPost');
    $routes->post('blog/create', 'Admin::createPost');
    
    // Team Management
    $routes->get('team', 'Admin::team');
    $routes->get('team/new', 'Admin::newTeamMember');
    $routes->post('team/create', 'Admin::createTeamMember');
    
    // Testimonials Management
    $routes->get('testimonials', 'Admin::testimonials');
    $routes->get('testimonials/new', 'Admin::newTestimonial');
    $routes->post('testimonials/create', 'Admin::createTestimonial');
    
    // Settings
    $routes->get('settings', 'Admin::settings');
    $routes->post('settings/update', 'Admin::updateSettings');
});
$routes->get('about', 'Home::about');
$routes->get('service', 'Home::service');
$routes->get('blog', 'Home::blog');
$routes->get('contact', 'Home::contact');
$routes->get('quote', 'Home::quote');
$routes->get('team', 'Home::team');
$routes->get('testimonial', 'Home::testimonial');
$routes->get('feature', 'Home::feature');
$routes->get('detail/(:any)', 'Home::detail/$1');
$routes->get('admin/home', 'Admin::home');
$routes->post('/admin/homeedit/(:num)', 'Admin::updateHome/$1');
$routes->get('admin/about', 'Admin::about');
$routes->post('/admin/aboutedit/(:num)', 'Admin::updateAbout/$1');
$routes->get('admin/whychooseus', 'Admin::whychooseus');
$routes->post('/admin/whychooseusedit/(:num)', 'Admin::updateWhyChooseUs/$1');
$routes->get('admin/ourservices', 'Admin::ourServices');
$routes->post('/admin/servicesedit/(:num)', 'Admin::updateOurServices/$1');






