@extends('backend.admin-master')
@section('site-title')
    {{__('Create An Appointment')}}
@endsection
@section('style')
<x-media.css/>
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                <x-msg.all/>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="header-wrapp">
                            <h4 class="header-title">{{__('Book an Appointment')}}  </h4>
                            <div class="header-title">
                                <a href="{{route('admin.appointment.all')}}" class="btn btn-primary mt-4 pr-4 pl-4" >{{__('All Doctors')}}</a>
                            </div>
                        </div>
                        <div class="appointment-details-item">
                            <div class="top-part">
                                <div class="thumb">
                                    {!! render_image_markup_by_attachment_id($appointment->image,'full') !!}
                                </div>
                                <div class="content">
                                    @if($appointment->designation)
                                    <span class="designation">{{$appointment->designation}}</span>
                                    @endif
                                    <h2 class="title">{{$appointment->title}}</h2>
                                    <div class="short-description">{!! purify_html($appointment->short_description)!!}</div>
                                    @if($appointment->location)
                                    <div class="location"><i class="fas fa-map-marked-alt"></i>  {{$appointment->location}}</div>
                                    @endif
                                    <div class="price-wrap">
                                        <h4 class="price">{{__('Fee')}}: <span>{{amount_with_currency_symbol($appointment->price)}}</span></h4>
                                    </div>
                                    <div class="social-share-wrap">
                                        <ul class="social-share">
                                            {!! single_post_share(route('frontend.appointment.single',['slug' => $appointment->slug, 'id' => $appointment->id]),purify_html($appointment->title),get_attachment_url_by_id($appointment->image,'full')) !!}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                             <div class="bottom-part">
                                 <x-msg.success/>
                                 <x-msg.error/>
                                 <nav>
                                     <div class="nav nav-tabs" role="tablist">
                                         <a class="nav-link "  data-toggle="tab" href="#nav-information" role="tab"  aria-selected="false">{{get_static_option('appointment_single_information_tab_title')}}</a>
                                         <a class="nav-link active"  data-toggle="tab" href="#nav-booking" role="tab"  aria-selected="true">{{get_static_option('appointment_single_booking_tab_title')}}</a>
                                     </div>
                                 </nav>
                                 <div class="tab-content" >
                                     <div class="tab-pane fade" id="nav-information" role="tabpanel" >
                                         <div class="information-area-wrap">
                                             <div class="description-wrap">
                                                 <h3 class="title">{{get_static_option('appointment_single_appointment_booking_about_me_title')}}</h3>
                                                 {!! purify_html_raw($appointment->description )!!}
                                             </div>
                                             @if(!empty(current($appointment->experience_info)))
                                             <div class="education-info">
                                                 <h3 class="title">{{get_static_option('appointment_single_appointment_booking_educational_info_title')}}</h3>
                                                 <ul class="circle-list">
                                                     @foreach($appointment->experience_info as $info)
                                                         <li>{{$info}}</li>
                                                     @endforeach
                                                 </ul>
                                             </div>
                                             @endif
                                             @if(!empty(current($appointment->additional_info)))
                                             <div class="additional-info">
                                                 <h3 class="title">{{get_static_option('appointment_single_appointment_booking_additional_info_title')}}</h3>
                                                 <ul class="circle-list">
                                                     @foreach($appointment->additional_info as $info)
                                                         <li>{{$info}}</li>
                                                     @endforeach
                                                 </ul>
                                             </div>
                                             @endif
                                             @if(!empty(current($appointment->specialized_info)))
                                             <div class="specialised-info">
                                                 <h3 class="title">{{get_static_option('appointment_single_appointment_booking_specialize_info_title')}}</h3>
                                                 <ul class="circle-list">
                                                     @foreach($appointment->specialized_info as $info)
                                                         <li>{{$info}}</li>
                                                     @endforeach
                                                 </ul>
                                             </div>
                                             @endif
                                         </div>
                                     </div>
                                     <div class="tab-pane fade show active" id="nav-booking" role="tabpanel" >
                                         @if($appointment->appointment_status === 'yes')
                                         <input type="hidden" id="appointment_id" name="appointment_id" value="{{$appointment->id}}">
                                         <div class="booking-wrap">
                                             <div class="left-part">
                                                 <div class="date-time-block">
                                                     <h4 class="title">{{__('Available On')}} <time>{{date('F Y')}}</time></h4>
                                                     <ul class="time-slot date">
                                                         <li data-date="{{date('d-m-Y')}}">{{date('D, d F, Y')}}</li>
                                                         @for($i=1; $i <7; $i++)
                                                             <li data-date="{{date('d-m-Y',strtotime("+".$i." day"))}}">{{date('D, d F, Y',strtotime("+".$i." day"))}}</li>
                                                         @endfor
                                                     </ul>
                                                 </div>
                                                 <div class="date-time-block">
                                                     <h4 class="title">{{__('Availability On')}} <time class="time_slog_date"><span class="small">{{__('( * please select any date )')}}</span></time></h4>
                                                     <div class="AppendBookingTime">
                                                         @include('frontend.pages.appointment.booking-time-component')
                                                     </div>
                                                 </div>
                                             </div>
                                             <div class="right-part">
                                                 <div class="form-wrapper">
                                                     <div class="billing-details-wrapper">
                                                         <div class="order-tab-wrap">
                                                             <div class="tab-content" >
                                                                 <div class="tab-pane fade show active" id="nav-profile" role="tabpanel">
                                                                     <h3 class="title">{{get_static_option('appointment_single_appointment_booking_information_text')}}</h3>
                                                                     <form action="{{route('admin.appointment.book')}}" method="post" class="appointment-booking-form" id="appointment-booking-form">
                                                                         @csrf
                                                                         <div class="error-message"></div>
                                                                         <input type="hidden" name="booking_date">
                                                                         <input type="hidden" name="booking_time_id">
                                                                         <input type="hidden" name="appointment_id" value="{{$appointment->id}}">
                                                                         <div class="form-group">
                                                                            <select name="user_id" class="form-control" id="user_id">
                                                                                <option value="">{{__('Select User')}}</option>
                                                                                @foreach ($all_users as $data)
                                                                                <option value="{{$data->id}}">{{$data->name}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                         <div class="form-group">
                                                                             <input type="text" name="name" id="user_name" class="form-control" placeholder="{{__('Name')}}" value="">
                                                                         </div>
                                                                         <div class="form-group">
                                                                             <input type="email" name="email" id="user_email" class="form-control" placeholder="{{__('Email')}}" value="">
                                                                         </div>
                                                                         {!! render_form_field_for_frontend(get_static_option('appointment_booking_page_form_fields')) !!}
                                                                         @if(!empty($appointment->price))
                                                                             {!! render_payment_gateway_for_form(false) !!}
                                                                             @if(!empty(get_static_option('manual_payment_gateway')))
                                                                                 <div class="form-group manual_payment_transaction_field" @if( get_static_option('site_default_payment_gateway') === 'manual_payment') style="display: block;"@endif >
                                                                                     <div class="label">{{__('Transaction ID')}}</div>
                                                                                     <input type="text" name="transaction_id" placeholder="{{__('transaction')}}" class="form-control">
                                                                                     <span class="help-info">{!! get_manual_payment_description() !!}</span>
                                                                                 </div>
                                                                             @endif
                                                                         @endif
                                                                         <div class="button-wrap">
                                                                             <button type="submit" class="btn-medheal btn-block appointment appo_booking_btn">{{get_static_option('appointment_single_appointment_booking_button_text')}} <i class="fas fa-spinner fa-spin d-none"></i></button>
                                                                         </div>
                                                                     </form>
     
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                         @else
                                            <div class="alert alert-warning"> {{__('Not Available')}}</div>
                                         @endif
                                     </div>
                                 </div>
                             </div>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<x-media.js/>
<script>
    (function ($){
            "use strict";
            $(document).on('click','.payment-gateway-wrapper > ul > li',function (e) {
                e.preventDefault();
                var gateway = $(this).data('gateway');
                var manual_gateway_tr = $('.manual_payment_transaction_field');
                $(this).addClass('selected').siblings().removeClass('selected');
                $('input[name="selected_payment_gateway"]').val(gateway);
                if(gateway === 'manual_payment'){
                    manual_gateway_tr.show();
                }else{
                    manual_gateway_tr.hide();
                }
            });
            $(document).on('click','.time-slot.date li',function (e){
                e.preventDefault();
                var date = $(this).data('date');
                var id = $("#appointment_id").val();
                date = date.split('-');
                var showDate = new Date(date[2]+'-'+ date[1]+'-'+date[0]);
                var day = showDate.toDateString().split(' ')[0];
                $('.time_slog_date').text(showDate.toDateString());
                $(this).toggleClass('selected').siblings().removeClass('selected');
                $('input[name="booking_date"]').val($(this).data('date'));
                $.ajax({
                        type:'GET',
                        url:  '{{route("frontend.appointment.booking.time")}}',
                        data: {day:day,id:id},
                        success: function(resp){
                        $(".AppendBookingTime").html(resp.view);
                        },error: function(){
                            console.log("Error");
                        }
                });
            });
            $(document).on('click','.time-slot.time li',function (e){
                e.preventDefault();
                $(this).toggleClass('selected').siblings().removeClass('selected');
                $('input[name="booking_time_id"]').val($(this).data('id'));
            });
            $(document).on('change','#user_id',function (e) {
               var id = $(this).val()
                $.ajax({
                   url: "{{route('admin.appointment.user.info')}}",
                   type: "GET",
                   data: {
                        id : id
                    },
                   success:function (data) {
                       $("#user_name").val(data.user.name)
                       $("#user_email").val(data.user.email)
                   }
                });
            });
        })(jQuery)
</script>
@endsection
