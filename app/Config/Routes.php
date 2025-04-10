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
    
    // Testimonials Management
    
    // Settings
    $routes->get('settings', 'Admin::settings');
    $routes->post('settings/update', 'Admin::updateSettings');
});
// Frontend Routes
$routes->get('about', 'Home::about');           // About page
$routes->get('service', 'Home::service');       // Services listing page
$routes->get('contact', 'Home::contact');       // Contact page
$routes->get('quote', 'Home::quote');          // Quote request page
$routes->get('team', 'Home::team');            // Team members page
$routes->get('testimonial', 'Home::testimonial'); // Testimonials page
$routes->get('feature', 'Home::feature');       // Features page
$routes->get('detail/(:any)', 'Home::detail/$1'); // Dynamic detail page

// Admin Dashboard Routes
$routes->get('admin/home', 'Admin::home');      // Home section management
$routes->post('/admin/homeedit/(:num)', 'Admin::updateHome/$1'); // Update home content

// Admin About Section
$routes->get('admin/about', 'Admin::about');    // About section management
$routes->post('/admin/aboutedit/(:num)', 'Admin::updateAbout/$1'); // Update about content

// Admin Why Choose Us Section
$routes->get('admin/whychooseus', 'Admin::whychooseus'); // Why choose us section
$routes->post('/admin/whychooseusedit/(:num)', 'Admin::updateWhyChooseUs/$1');

// Admin Services Management
$routes->get('admin/ourservices', 'Admin::ourServices');
$routes->get('admin/services', 'Admin::services');        // Services listing
$routes->post('admin/services/add', 'Admin::addService'); // Add new service
$routes->post('admin/servicesedit/(:num)', 'Admin::updateService/$1'); // Edit service
$routes->get('admin/services/delete/(:num)', 'Admin::deleteService/$1'); // Delete service

// Admin Quote Management
$routes->get('admin/quote', 'Admin::quote');    // Quote section management
$routes->post('/admin/quoteedit/(:num)', 'Admin::updateQuote/$1');

// Admin Pricing Management
$routes->get('admin/pricing', 'Admin::pricing'); // Pricing plans listing
$routes->post('admin/pricing/add', 'Admin::addPricing'); // Add new pricing
$routes->post('admin/pricingedit/(:num)', 'Admin::updatePricing/$1'); // Edit pricing
$routes->get('admin/pricing/delete/(:num)', 'Admin::deletePricing/$1'); // Delete pricing

// Admin Testimonials Management
$routes->get('admin/testimonials', 'Admin::Testimonials'); // Testimonials listing
$routes->post('admin/testimonials/add', 'Admin::addTestimonial'); // Add testimonial
$routes->post('admin/testimonialsedit/(:num)', 'Admin::updateTestimonial/$1'); // Edit
$routes->get('admin/testimonials/delete/(:num)', 'Admin::deleteTestimonial/$1'); // Delete

// Admin Team Management
$routes->get('admin/team', 'Admin::Team');      // Team members listing
$routes->post('admin/team/add', 'Admin::addTeam'); // Add team member
$routes->post('admin/teamedit/(:num)', 'Admin::updateTeam/$1'); // Edit team member
$routes->get('admin/team/delete/(:num)', 'Admin::deleteTeam/$1'); // Delete team member

// Admin Brand Management
$routes->get('admin/brand', 'Admin::brand');    // Brand partners listing
$routes->post('admin/brand/add', 'Admin::addBrand'); // Add brand
$routes->post('admin/brandedit/(:num)', 'Admin::updateBrand/$1'); // Edit brand
$routes->get('admin/brand/delete/(:num)', 'Admin::deleteBrand/$1'); // Delete brand

// Admin Site Settings
$routes->get('admin/headeraddress', 'Admin::headerAddress'); // Header address settings
$routes->post('admin/headeraddress/update', 'Admin::updateHeaderAddress');
$routes->get('admin/contact', 'Admin::contact'); // Contact information
$routes->post('admin/contactupdate/(:num)', 'Admin::updateContact/$1');
$routes->get('admin/footer', 'Admin::footer');  // Footer settings
$routes->post('admin/footerupdate/(:num)', 'Admin::updateFooterData/$1');
$routes->get('admin/headerlogo', 'Admin::headerLogo'); // Header logo management
$routes->post('admin/headerlogo/(:num)', 'Admin::updateHeaderLogo/$1');












