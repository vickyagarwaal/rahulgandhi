@extends('backend.admin-master')
@section('site-title')
    {{__('Search Doctors')}}
@endsection
@section('style')
<x-datatable.css/>
<x-media.css/>
<style>
    button#search {
        margin-top: 30px !important;
    }
</style>
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-12 mt-5">
                @include('backend.partials.message')
                @if(!empty($error_msg))
                    <div class="alert alert-danger">{{$error_msg}}</div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{__("Search Doctors")}}</h4>
                        <form action="{{route('admin.appointment.search')}}" method="get" enctype="multipart/form-data" id="report_generate_form">
                            <input type="hidden" name="page" value="1">
                            
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="appointment_title">{{__('Doctor Name')}}</label>
                                        <input type="text" name="appointment_title" value="{{$appointment_title}}" class="form-control" placeholder="{{__('Enter Doctor Name')}}">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="appointment_category_search">{{__('Category')}}</label>
                                        <select name="appointment_category_search" class="form-control" id="appointment_category_search">
                                            <option value="">{{__("Select Category")}}</option>
                                            @foreach($appointment_category as $category)
                                                <option @if($category->id == $appointment_category_search) selected @endif  value="{{$category->id}}">{{purify_html($category->name)}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="appointment_min_price">{{__('Min Fee')}}</label>
                                        <input type="number" name="appointment_min_price" value="{{$appointment_min_price}}" class="form-control"  min="0">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="appointment_max_price">{{__('Max Fee')}}</label>
                                        <input type="number" name="appointment_max_price" value="{{$appointment_max_price}}" class="form-control" min="0">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="appointment_day">{{__('Select Appointment Day')}}</label>
                                        @php
                                        $booking_infos = ['saturday','sunday','monday','tuesday','wednesday','thursday','friday'];
                                        @endphp
                                        <select class="form-control" name="appointment_day" id="appointment_day">
                                            <option value="" selected>{{__("Select Appointment Day")}}</option>
                                            @foreach($booking_infos as $week)
                                                <option value="{{$week}}" @if($week == $appointment_day) selected @endif>{{ Str::ucfirst($week) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <button type="submit" id="search" class="btn btn-lg btn-primary pr-4 pl-4"> <i class="fas fa-search mr-1 "></i> {{__('Search')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <hr>
                @if(!empty($all_appointment))
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <x-bulk-action/>
                            <div class="table-wrap table-responsive">
                                <table class="table table-default">
                                    <thead>
                                    <th class="no-sort">
                                        <div class="mark-all-checkbox">
                                            <input type="checkbox" class="all-checkbox">
                                        </div>
                                    </th>
                                    <th>{{__('ID')}}</th>
                                    <th>{{__('Title')}}</th>
                                    <th>{{__('Image')}}</th>
                                    <th>{{__('Price')}}</th>
                                    <th>{{__('Category')}}</th>
                                    <th>{{__('Status')}}</th>
                                    <th>{{__('Action')}}</th>
                                    </thead>
                                    <tbody>
                                        @if(isset($appointment_day) && !empty($appointment_day))
                                        @foreach($all_appointment as $data)
                                        @if(isset($data['booking_info'][$appointment_day]['status']) && $data['booking_info'][$appointment_day]['status'] != null)
                                            <tr class="{{ $data['id']}}">
                                                <td>
                                                    <div class="bulk-checkbox-wrapper">
                                                        <input type="checkbox" class="bulk-checkbox"
                                                            name="bulk_delete[]" value="{{$data->id}}">
                                                    </div>
                                                </td>
                                                <td>{{$data->id}}</td>
                                                <td>{{$data->title}}</td>
                                                <td>
                                                    <div class="img-wrap">
                                                        @php
                                                            $event_img = get_attachment_image_by_id($data->image,'thumbnail',true);
                                                        @endphp
                                                        @if (!empty($event_img))
                                                            <div class="attachment-preview">
                                                                <div class="thumbnail">
                                                                    <div class="centered">
                                                                        <img class="avatar user-thumb"
                                                                            src="{{$event_img['img_url']}}" alt="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>{{amount_with_currency_symbol($data->price)}}</td>
                                                <td>{{$data->category ? $data->category->name : __('Anonymous')}}</td>
                                                <td>
                                                    <x-status-span :status="$data->status"/>
                                                </td>
                                                <td>
                                                    <x-delete-popover :url="route('admin.appointment.delete',$data->id)"/>
                                                    <x-edit-icon :url="route('admin.appointment.edit',$data->id)"/>
                                                    <x-view-icon :url="route('frontend.appointment.single',['slug'=>$data->slug,'id'=>$data->id])"/>
                                                        <a class="btn btn-success btn-xs mb-3 mr-1" href="" 
                                                        id="booking_info" 
                                                        title="{{_('View Booking Time')}}"
                                                        data-toggle="modal"
                                                        data-target="#booking_show" 
                                                        data-id="{{$data->id}}">
                                                            <i class="far fa-calendar-alt"></i>
                                                        </a>
                                                        <div>
                                                            <a  id="working" 
                                                                href="{{route('admin.appointment.create.page',$data->id)}}" 
                                                                title="Book Appointment" 
                                                                class="btn-medheal">
                                                                {{__('Book Appointment')}}
                                                            </a>
                                                        </div>
                                                      
                                                </td>
                                            </tr>
                                        @endif
                                        @endforeach
                                        @else
                                        @foreach($all_appointment as $data)
                                            <tr class="{{ $data['id']}}">
                                                <td>
                                                    <div class="bulk-checkbox-wrapper">
                                                        <input type="checkbox" class="bulk-checkbox"
                                                            name="bulk_delete[]" value="{{$data->id}}">
                                                    </div>
                                                </td>
                                                <td>{{$data->id}}</td>
                                                <td>{{$data->title}}</td>
                                                <td>
                                                    <div class="img-wrap">
                                                        @php
                                                            $event_img = get_attachment_image_by_id($data->image,'thumbnail',true);
                                                        @endphp
                                                        @if (!empty($event_img))
                                                            <div class="attachment-preview">
                                                                <div class="thumbnail">
                                                                    <div class="centered">
                                                                        <img class="avatar user-thumb"
                                                                            src="{{$event_img['img_url']}}" alt="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>{{amount_with_currency_symbol($data->price)}}</td>
                                                <td>{{$data->category ? $data->category->name : __('Anonymous')}}</td>
                                                <td>
                                                    <x-status-span :status="$data->status"/>
                                                </td>
                                                <td>
                                                    <x-delete-popover :url="route('admin.appointment.delete',$data->id)"/>
                                                    <x-edit-icon :url="route('admin.appointment.edit',$data->id)"/>
                                                    <x-view-icon :url="route('frontend.appointment.single',['slug'=>$data->slug,'id'=>$data->id])"/>
                                                        <a class="btn btn-success btn-xs mb-3 mr-1" href="" 
                                                        id="booking_info" 
                                                        title="{{_('View Booking Time')}}"
                                                        data-toggle="modal"
                                                        data-target="#booking_show" 
                                                        data-id="{{$data->id}}">
                                                            <i class="far fa-calendar-alt"></i>
                                                        </a>
                                                        <div>
                                                            <a  id="working" 
                                                                href="{{route('admin.appointment.create.page',$data->id)}}" 
                                                                title="Book Appointment" 
                                                                class="btn-medheal">
                                                                {{__('Book Appointment')}}
                                                            </a>
                                                        </div>
                                                    </td>
                                            </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="modal fade" id="booking_show" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <div class="modal-body">
                    <div id="AppendShowTime">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<x-datatable.js/>
<x-action.bulk.animate :url="route('admin.appointment.bulk.action')" />
<x-btn.custom :id="'search'" :title="__('Searching...')" />
<x-media.js/>
<script>
    (function ($){
            "use strict";
            $(document).on('click','#booking_info',function (e) {
                e.preventDefault();
               var el = $(this)
               var id = el.data('id')
                $.ajax({
                   url: "{{route('admin.bookin.time.show')}}",
                   type: "GET",
                   data: {id : id},
                   success:function (data) {
                        $("#AppendShowTime").html(data.view);
                   }
                });
             
             });
        })(jQuery)
</script>
@endsection
