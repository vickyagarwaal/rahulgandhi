@extends('backend.admin-master')
@section('site-title')
    {{__('Prescription Settings')}}
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-12 mt-5">
                <x-msg.success/>
                <x-msg.error/>
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{__("Prescription Settings")}}</h4>
                        <form action="{{route('admin.prescription.settings')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="prescription_form_title">{{__('Prescription Form Title ')}}</label>
                                <input type="text" name="prescription_form_title"  class="form-control" value="{{get_static_option('prescription_form_title')}}">
                            </div>
                            <div class="form-group">
                                <label for="prescription_button_text">{{__('Prescription Button Text ')}}</label>
                                <input type="text" name="prescription_button_text"  class="form-control" value="{{get_static_option('prescription_button_text')}}">
                            </div>
                            <div class="form-group">
                                <label for="prescription_notify_mail">{{__('Prescription Notify Email')}}</label>
                                <input type="email" name="prescription_notify_mail"  class="form-control" value="{{get_static_option('prescription_notify_mail')}}">
                            </div>
                            <div class="form-group">
                                <label for="prescription_form_submission_msg">{{__('Prescription Form Submission Message')}}</label>
                                <input type="text" name="prescription_form_submission_msg"  class="form-control" value="{{get_static_option('prescription_form_submission_msg')}}">
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
