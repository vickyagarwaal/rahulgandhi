<section class="creative-team-area padding-top-120 @if($home_variant_number == '02') padding-bottom-90 @endif">
    <div class="container">
        <div class="creative-team-wrapper @if($home_variant_number != '02') m-bottom @endif">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title b-top padding-top-25 margin-bottom-55 desktop-center">
                        <h2 class="title">{{get_static_option('home_page_appointment_section_title')}}</h2>
                        <p>{{get_static_option('home_page_appointment_section_description')}}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="doctors-team-carousel">
                        @foreach($all_appointment as $data)
                            <x-frontend.appointment.doctor
                                    :slug="$data->slug"
                                    :title="$data->title"
                                    :id="$data->id"
                                    :image="$data->image"
                                    :designation="$data->designation"
                                    :location="$data->location">
                            </x-frontend.appointment.doctor>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>