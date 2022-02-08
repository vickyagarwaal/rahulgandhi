<?php


namespace App\MenuBuilder;


class MenuBuilderSetup extends MenuBuilderBase
{

    public static function Instance(){
        return new self();
    }

    public static function multilang(){
        return false;
    }

    public function  static_pages_list()
    {
        // TODO: Implement static_pages_list() method.
        return [
            'about',
            'contact',
            'blog',
            'service',
            'product',
            'appointment',
            'faq',
            'image_gallery',
            'testimonial',
            'prescription',
        ];
    }

    function register_dynamic_menus()
    {
        // TODO: Implement register_dynamic_menus() method.
        return [
            'service' => [
                'model' => 'App\Services',
                'name' => 'service_page_name',
                'route' => 'frontend.services.single',
                'route_params' => ['slug','id'],
                'title_param' => 'title',
                'query' => 'no_lang' //old_lang|new_lang|no_lang
            ],
            'pages' => [
                'model' => 'App\Page',
                'name' => 'pages_page_name',
                'route' => 'frontend.dynamic.page',
                'route_params' => ['slug','id'],
                'title_param' => 'title',
                'query' => 'no_lang' //old_lang|new_lang
            ],
            'blog' => [
                'model' => 'App\Blog',
                'name' => 'blog_page_name',
                'route' => 'frontend.blog.single',
                'route_params' => ['slug','id'],
                'title_param' => 'title',
                'query' => 'no_lang' //old_lang|new_lang
            ],
            'product' => [
                'model' => 'App\Products',
                'name' => 'product_page_name',
                'route' => 'frontend.products.single',
                'route_params' => ['slug','id'],
                'title_param' => 'title',
                'query' => 'no_lang', //old_lang|new_lang
                'enable_when'  => false
            ],
            'appointment' => [
                'model' => 'App\Appointment',
                'name' => 'appointment_page_name',
                'route' => 'frontend.appointment.single',
                'route_params' => ['slug','id'],
                'title_param' => 'title',
                'query' => 'no_lang', //old_lang|new_lang
                'enable_when'  => false
            ],
        ];
    }

}