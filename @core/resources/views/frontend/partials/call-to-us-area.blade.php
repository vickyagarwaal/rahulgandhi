<div class="call-to-action-area bg-grey bg-image"
{!! render_background_image_markup_by_attachment_id(get_static_option('home_page_expert_section_bg')) !!}
>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-6">
                <div class="call-to-action-inner">
                    <h2 class="title">{{get_static_option('home_page_call_to_us_section_title')}}</h2>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="call-to-action-item">
                    <div class="icon">
                        <i class="{{get_static_option('home_page_call_to_us_section_support_icon')}}"></i>
                    </div>
                    <div class="content">
                        <h3 class="title">{{get_static_option('home_page_call_to_us_section_support_title')}}</h3>
                        <a href="tel:{{get_static_option('home_page_call_to_us_section_support_details')}}" class="subtitle">{{get_static_option('home_page_call_to_us_section_support_details')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>