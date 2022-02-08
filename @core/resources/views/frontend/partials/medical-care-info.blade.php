<div class="medical-care-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="medical-care-care-list">
                    <li class="medical-care-care">
                        <div class="section-title">
                            <h3 class="title">{{get_static_option('home_page_medical_care_section_info_title')}}</h3>
                            <p>{{get_static_option('home_page_medical_care_section_info_details')}}</p>
                        </div>
                        @foreach ($all_medical_care_items as $data)
                        <div class="care-single-item">
                            <div class="icon">
                                <i class="{{$data->icon}}"></i>
                            </div>
                            <div class="content">
                                <h4 class="title">{{$data->title}}</h4>
                            </div>
                        </div>
                        @endforeach
                    </li>
                    <li class="opening-content bg-image" {!! render_background_image_markup_by_attachment_id(get_static_option('home_page_medical_care_section_opening_bg')) !!}>
                        <h3 class="title">{{get_static_option('home_page_medical_care_section_opening_hour_title')}}</h3>
                        <ul>
                            @foreach ($all_opening_hour_items as $data)
                            <li><a>{{$data->title}}<span>{{$data->details}}</span></a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="request-page-form-wrap bg-image" {!! render_background_image_markup_by_attachment_id(get_static_option('home_page_medical_care_section_appointment_bg')) !!}>
                        <div class="section-title">
                            <h4 class="title">{{get_static_option('home_page_medical_care_section_appointment_title')}}</h4>
                        </div>
                        <a href="{{route('frontend.appointment')}}" class="appointment-btn">{{ get_static_option('home_page_medical_care_section_appointment_button_text') }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>