<div class="countdown-area bg-image padding-top-120 padding-bottom-120" {!! render_background_image_markup_by_attachment_id(get_static_option('home_page_special_offer_section_bg')) !!}>
    <div class="container">
        <input type="hidden" id="offer_time_end" value="{{get_static_option('home_page_special_offer_section_offer_end_date')}}">
        <div class="row">
            <div class="col-xl-6 col-lg-12">
                <div class="section-inner-title">
                    <h4 class="title">{{get_static_option('home_page_special_offer_section_title')}}</h4>
                    <p>{{get_static_option('home_page_special_offer_section_details')}}</p>
                </div>
                <div id="mycountdown" class="counter-part">
                </div>
                @if(!empty(get_static_option('home_page_special_offer_section_btn_status')))
                <div class="btn-wrapper">
                    <a href="{{get_static_option('home_page_special_offer_section_btn_url')}}" class="boxed-btn">{{get_static_option('home_page_special_offer_section_btn_txt')}}</a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>