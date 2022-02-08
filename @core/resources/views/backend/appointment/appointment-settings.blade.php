@extends('backend.admin-master')
@section('site-title')
    {{__('Appointment Settings')}}
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-12 mt-5">
                <x-msg.success/>
                <x-msg.error/>
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{__("Appointment Settings")}}</h4>
                        <form action="{{route('admin.appointment.booking.settings')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                           <div class="form-group">
                               <label for="appointment_single_information_tab_title">{{__('Single Page Information Tab Title')}}</label>
                               <input type="text" name="appointment_single_information_tab_title"  class="form-control" value="{{get_static_option('appointment_single_information_tab_title')}}" >
                           </div>
                           <div class="form-group">
                               <label for="appointment_single_booking_tab_title">{{__('Single Page Booking Tab Title')}}</label>
                               <input type="text" name="appointment_single_booking_tab_title"  class="form-control" value="{{get_static_option('appointment_single_booking_tab_title')}}">
                           </div>
                           <div class="form-group">
                               <label for="appointment_single_feedback_tab_title">{{__('Single Page Feedback Tab Title')}}</label>
                               <input type="text" name="appointment_single_feedback_tab_title"  class="form-control" value="{{get_static_option('appointment_single_feedback_tab_title')}}">
                           </div>
                           <div class="form-group">
                               <label for="appointment_single_appointment_booking_information_text">{{__('Single Page Booking Information Text')}}</label>
                               <input type="text" name="appointment_single_appointment_booking_information_text"  class="form-control" value="{{get_static_option('appointment_single_appointment_booking_information_text')}}">
                           </div>
                           <div class="form-group">
                               <label for="appointment_single_appointment_booking_button_text">{{__('Single Page Appointment Booking Button Text')}}</label>
                               <input type="text" name="appointment_single_appointment_booking_button_text"  class="form-control" value="{{get_static_option('appointment_single_appointment_booking_button_text')}}">
                           </div>
                           <div class="form-group">
                               <label for="appointment_single_appointment_booking_about_me_title">{{__('Single Page About me Title')}}</label>
                               <input type="text" name="appointment_single_appointment_booking_about_me_title"  class="form-control" value="{{get_static_option('appointment_single_appointment_booking_about_me_title')}}">
                           </div>
                           <div class="form-group">
                               <label for="appointment_single_appointment_booking_educational_info_title">{{__('Single Page Education Info Title')}}</label>
                               <input type="text" name="appointment_single_appointment_booking_educational_info_title"  class="form-control" value="{{get_static_option('appointment_single_appointment_booking_educational_info_title')}}">
                           </div>
                           <div class="form-group">
                               <label for="appointment_single_appointment_booking_additional_info_title">{{__('Single Page Additional Info Title')}}</label>
                               <input type="text" name="appointment_single_appointment_booking_additional_info_title"  class="form-control" value="{{get_static_option('appointment_single_appointment_booking_additional_info_title')}}">
                           </div>
                           <div class="form-group">
                               <label for="appointment_single_appointment_booking_specialize_info_title">{{__('Single Page Specialize Info Title')}}</label>
                               <input type="text" name="appointment_single_appointment_booking_specialize_info_title"  class="form-control" value="{{get_static_option('appointment_single_appointment_booking_specialize_info_title')}}">
                           </div>
                           <div class="form-group">
                               <label for="appointment_single_appointment_booking_client_feedback_title">{{__('Single Page Client Feedback Title')}}</label>
                               <input type="text" name="appointment_single_appointment_booking_client_feedback_title"  class="form-control" value="{{get_static_option('appointment_single_appointment_booking_client_feedback_title')}}">
                           </div>
                           <div class="form-group">
                               <label for="appointment_booking_success_page_title">{{__('Booking Success Page Title')}}</label>
                               <input type="text" name="appointment_booking_success_page_title"  class="form-control" value="{{get_static_option('appointment_booking_success_page_title')}}">
                           </div>
                           <div class="form-group">
                               <label for="appointment_booking_success_page_description">{{__('Booking Success Page Description')}}</label>
                               <textarea name="appointment_booking_success_page_description" cols="30" class="form-control" rows="5">{{get_static_option('appointment_booking_success_page_description')}}</textarea>
                           </div>
                           <div class="form-group">
                               <label for="appointment_booking_cancel_page_title">{{__('Booking Cancel Page Title')}}</label>
                               <input type="text" name="appointment_booking_cancel_page_title"  class="form-control" value="{{get_static_option('appointment_booking_cancel_page_title')}}">
                           </div>
                           <div class="form-group">
                               <label for="appointment_booking_cancel_page_description">{{__('Booking Cancel Page Description')}}</label>
                               <textarea name="appointment_booking_cancel_page_description" cols="30" class="form-control" rows="5">{{get_static_option('appointment_booking_cancel_page_description')}}</textarea>
                           </div>
                           <div class="form-group">
                               <label for="appointment_page_booking_button_text">{{__('Booking Button Text')}}</label>
                               <input type="text" name="appointment_page_booking_button_text"  class="form-control" value="{{get_static_option('appointment_page_booking_button_text')}}">
                           </div>
                            <div class="form-group">
                                <label for="appointment_notify_mail">{{__('Appointment Notify Email')}}</label>
                                <input type="email" name="appointment_notify_mail"  class="form-control" value="{{get_static_option('appointment_notify_mail')}}">
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
@endsection
