@extends('backend.admin-master')
@section('site-title')
    {{__('Basic Settings')}}
@endsection
@section('style')
    <link rel="stylesheet" href="{{asset('assets/backend/css/colorpicker.css')}}">
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-12 mt-5">
                <x-msg.all/>
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{__("Basic Settings")}}</h4>
                        <form action="{{route('admin.general.basic.settings')}}" method="POST" enctype="multipart/form-data">@csrf
                            <div class="form-group">
                                <label for="site_title">{{__('Site Title')}}</label>
                                <input type="text" name="site_title"  class="form-control" value="{{get_static_option('site_title')}}" id="site_title">
                            </div>
                            <div class="form-group">
                                <label for="site_tag_line">{{__('Site Tag Line')}}</label>
                                <input type="text" name="site_tag_line"  class="form-control" value="{{get_static_option('site_tag_line')}}" id="site_tag_line">
                            </div>
                            <div class="form-group">
                                <label for="site_footer_copyright">{{__('Footer Copyright')}}</label>
                                <textarea name="site_footer_copyright" cols="5" class="form-control" rows="2∂">{{get_static_option('site_footer_copyright')}}</textarea>
                                <small class="form-text text-muted">{{__('{copy} will replace by ©; and {year} will be replaced by current year.')}}</small>
                            </div>            
                            <div class="form-group">
                                <label for="site_payment_gateway"><strong>{{__('Payment Gateway')}}</strong></label>
                                <label class="switch">
                                    <input type="checkbox" name="site_payment_gateway"  @if(!empty(get_static_option('site_payment_gateway'))) checked @endif id="site_payment_gateway">
                                    <span class="slider-enable-disable"></span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="disable_user_email_verify"><strong>{{__('User Email Verify')}}</strong></label>
                                <label class="switch">
                                    <input type="checkbox" name="disable_user_email_verify"  @if(!empty(get_static_option('disable_user_email_verify'))) checked @endif id="disable_user_email_verify">
                                    <span class="slider-enable-disable"></span>
                                </label>
                                <small class="form-text text-muted">{{__('Disable, means user must have to verify their email account in order to access his/her dashboard.')}}</small>
                            </div>
                            <div class="form-group">
                                <label for="site_maintenance_mode"><strong>{{__('Maintenance Mode')}}</strong></label>
                                <label class="switch yes">
                                    <input type="checkbox" name="site_maintenance_mode"  @if(!empty(get_static_option('site_maintenance_mode'))) checked @endif id="site_maintenance_mode">
                                    <span class="slider-enable-disable"></span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="admin_loader_animation"><strong>{{__('Admin Preloader Animation')}}</strong></label>
                                <label class="switch yes">
                                    <input type="checkbox" name="admin_loader_animation"  @if(!empty(get_static_option('admin_loader_animation'))) checked @endif id="admin_loader_animation">
                                    <span class="slider-enable-disable"></span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="site_loader_animation"><strong>{{__('Site Preloader Animation')}}</strong></label>
                                <label class="switch yes">
                                    <input type="checkbox" name="site_loader_animation"  @if(!empty(get_static_option('site_loader_animation'))) checked @endif id="site_loader_animation">
                                    <span class="slider-enable-disable"></span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="guest_order_system_status"><strong>{{__('Guest Order System')}}</strong></label>
                                <label class="switch yes">
                                    <input type="checkbox" name="guest_order_system_status"  @if(!empty(get_static_option('guest_order_system_status'))) checked @endif id="guest_order_system_status">
                                    <span class="slider-enable-disable"></span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="admin_panel_rtl_status"><strong>{{__('Admin Panel RTL Support')}}</strong></label>
                                <label class="switch yes">
                                    <input type="checkbox" name="admin_panel_rtl_status"  @if(!empty(get_static_option('admin_panel_rtl_status'))) checked @endif id="admin_panel_rtl_status">
                                    <span class="slider-enable-disable"></span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="product_track_status"><strong>{{__('Product Track Enable/Disable')}}</strong></label>
                                <label class="switch yes">
                                    <input type="checkbox" name="product_track_status"  @if(!empty(get_static_option('product_track_status'))) checked @endif id="product_track_status">
                                    <span class="slider-enable-disable"></span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="site_google_captcha_enable"><strong>{{__('Google Captcha')}}</strong></label>
                                <label class="switch yes">
                                    <input type="checkbox" name="site_google_captcha_enable"  @if(!empty(get_static_option('site_google_captcha_enable'))) checked @endif id="site_google_captcha_enable">
                                    <span class="slider-enable-disable"></span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="site_main_color_one">{{__('Site Main Color One')}}</label>
                                <input type="text" name="site_main_color_one" style="background-color: {{get_static_option('site_main_color_one')}};color: #fff;" class="form-control" value="{{get_static_option('site_main_color_one')}}" id="site_main_color_one">
                                <small class="form-text text-muted">{{__('you can change -site main color- from here, it will replace the website main color')}}</small>
                            </div>
                            <div class="form-group">
                                <label for="site_main_color_two">{{__('Site Main Color Two')}}</label>
                                <input type="text" name="site_main_color_two" style="background-color: {{get_static_option('site_main_color_two')}};color: #fff;" class="form-control" value="{{get_static_option('site_main_color_two')}}" id="site_main_color_two">
                                <small class="form-text text-muted">{{__('you can change -site base color- from here, it will replace the website base color')}}</small>
                            </div>
                            <div class="form-group">
                                <label for="site_secondary_color">{{__('Site Secondary Color')}}</label>
                                <input type="text" name="site_secondary_color" style="background-color: {{get_static_option('site_secondary_color')}};color: #fff;" class="form-control" value="{{get_static_option('site_secondary_color')}}" id="site_secondary_color">
                                <small class="form-text text-muted">{{__('you can change -site secondary color- from here, it will replace the website secondary color')}}</small>
                            </div>
                            <div class="form-group">
                                <label for="site_heading_color">{{__('Site Heading Color')}}</label>
                                <input type="text" name="site_heading_color" style="background-color: {{get_static_option('site_heading_color')}};color: #fff;" class="form-control" value="{{get_static_option('site_heading_color')}}" id="site_heading_color">
                                <small class="form-text text-muted">{{__('you can change -site heading color- from here, it will replace the website heading color')}}</small>
                            </div>
                            <div class="form-group">
                                <label for="site_paragraph_color">{{__('Site Paragraph Color')}}</label>
                                <input type="text" name="site_paragraph_color" style="background-color: {{get_static_option('site_paragraph_color')}};color: #fff;" class="form-control" value="{{get_static_option('site_paragraph_color')}}" id="site_paragraph_color">
                                <small class="form-text text-muted">{{__('you can change -site paragraph color- from here, it will replace the website paragraph color')}}</small>
                            </div>
                            <button type="submit" id="update" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Update Changes')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<x-btn.update/>
    <script src="{{asset('assets/backend/js/colorpicker.js')}}"></script>
    <script>
        (function($){
            "use strict";
            $(document).ready(function(){
                <x-icon-picker/>
                initColorPicker('#site_main_color_one');
                initColorPicker('#site_main_color_two');
                initColorPicker('#site_secondary_color');
                initColorPicker('#site_heading_color');
                initColorPicker('#site_paragraph_color');
                function initColorPicker(selector){
                    $(selector).ColorPicker({
                        color: '#852aff',
                        onShow: function (colpkr) {
                            $(colpkr).fadeIn(500);
                            return false;
                        },
                        onHide: function (colpkr) {
                            $(colpkr).fadeOut(500);
                            return false;
                        },
                        onChange: function (hsb, hex, rgb) {
                            $(selector).css('background-color', '#' + hex);
                            $(selector).val('#' + hex);
                        }
                    });
                }
            });
        }(jQuery));
    </script>
@endsection
