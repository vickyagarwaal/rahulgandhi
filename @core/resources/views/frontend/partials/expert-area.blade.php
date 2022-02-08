<div class="our-expert-area bg-grey bg-image padding-top-500 padding-bottom-110" {!! render_background_image_markup_by_attachment_id(get_static_option('home_page_expert_section_bg')) !!} >
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="experts-content">
                    <div class="section-title white">
                        <div class="icon">
                            <i class="{{get_static_option('home_page_expert_section_icon')}}"></i>
                        </div>
                        <h4 class="title"> {{get_static_option('home_page_expert_section_title')}} </h4>
                    </div>
                    <div class="info-bar-item-02">
                        <div class="icon"><i class="{{get_static_option('home_page_expert_section_support_icon')}}"></i></div>
                        <div class="content">
                            <span class="title">{{get_static_option('home_page_expert_section_support_title')}}</span>
                            <p class="details">{{get_static_option('home_page_expert_section_support_details')}}</p>
                        </div>
                    </div>
                </div>
            </div>
            @for($i = 1 ; $i < 3 ; $i++)
            <div class="col-lg-3 col-md-6">
                <div class="expert-single-item bg-image {{($i == 2)? 'margin-top-80' : ''}}" {!! render_background_image_markup_by_attachment_id(get_static_option('home_page_expert_section_bg_'.$i)) !!}>
                    <div class="content {{($i == 2)? 'style-01' : ''}}">
                        <div class="icon">
                            <i class="{{get_static_option('home_page_expert_section_support_icon_'.$i)}}"></i>
                        </div>
                        <h4 class="title">{{get_static_option('home_page_expert_section_title_'.$i)}}</h4>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </div>
</div>