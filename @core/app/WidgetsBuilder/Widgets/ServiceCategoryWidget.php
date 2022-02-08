<?php


namespace App\WidgetsBuilder\Widgets;


use App\BlogCategory;
use App\ServiceCategory;
use App\Services;
use App\WidgetsBuilder\WidgetBase;
use Illuminate\Support\Str;

class ServiceCategoryWidget extends WidgetBase
{

    public function admin_render()
    {
        // TODO: Implement admin_render() method.
        $output = $this->admin_form_before();
        $output .= $this->admin_form_start();
        $output .= $this->default_fields();
        $widget_saved_values = $this->get_settings();
        //end multi langual tab option
        $post_items = $widget_saved_values['post_items'] ?? '';
        $output .= '<div class="form-group"><input type="text" name="post_items" class="form-control" placeholder="' . __('Post Items') . '" value="' . $post_items . '"></div>';

        $output .= $this->admin_form_submit_button();
        $output .= $this->admin_form_end();
        $output .= $this->admin_form_after();

        return $output;
    }

    public function frontend_render()
    {
        // TODO: Implement frontend_render() method.
        $widget_saved_values = $this->get_settings();

        $widget_title = $widget_saved_values['widget_title'] ?? '';
        $post_items = $widget_saved_values['post_items'] ?? '';

        $category = ServiceCategory::where('status','publish')->orderBy('id','desc')->take($post_items)->get();
        $service = Services::find(\Request::route('id'));
        $output =  '<div class="widget-nav-menu margin-bottom-30">';
        $output .= '<ul>';
        foreach ($category as $data) {
            if(\Request::is('service/category/*')){
                $class_name = ($data->id == \Request::route('id'))? 'active' : '';
            }else{
                $class_name = !empty($service) && ($data->id == $service->category_id)? 'active' : '';
            }
            $output .= '<li class="service-item-list '.$class_name.'">';
            $output .= '<div class="icon">';
            $output .= '<i class="'.$data->icon.'"></i>';
            $output .= '</div>';
            $output .= '<div class="service-title">';
            $output .= '<h4 class="title"> <a href="' . route('frontend.services.category', ['id' => $data->id,'any' => Str::slug(purify_html($data->name))]) . '">'.$data->name.'</a> </h4>';
            $output .= '</div>';
            $output .= '</li>';
        }
        $output .= '</ul>';
        $output .= '</div>';

        return $output;
    }

    public function widget_title()
    {
        // TODO: Implement widget_title() method.
        return __('Service Category');
    }
}