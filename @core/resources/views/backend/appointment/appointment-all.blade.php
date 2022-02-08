@extends('backend.admin-master')
@section('site-title')
    {{__('All Doctors')}}
@endsection
@section('style')
<x-datatable.css/>
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
                            <h4 class="header-title">{{__('All Doctors')}}  </h4>
                            <div class="header-title">
                                <a href="{{route('admin.appointment.new')}}" class="btn btn-primary mt-4 pr-4 pl-4" >{{__('Add New Doctor')}}</a>
                            </div>
                        </div>
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
                                <th>{{__('Appointment Status')}}</th>
                                <th>{{__('Status')}}</th>
                                <th>{{__('Action')}}</th>
                                </thead>
                                <tbody>
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
                                                <x-status-span :status="$data->appointment_status"/>
                                            </td>
                                            <td>
                                                <x-status-span :status="$data->status"/>
                                            </td>
                                            <td>
                                                <x-delete-popover :url="route('admin.appointment.delete',$data->id)"/>
                                                <x-edit-icon :url="route('admin.appointment.edit',$data->id)"/>
                                                <x-view-icon :url="route('frontend.appointment.single',['slug'=>$data->slug,'id'=>$data->id])"/>
                                                <x-backend.clone-icon :url="route('admin.appointment.clone')" :id="$data->id"/>
                                                <a class="btn btn-success btn-xs mb-3 mr-1" href="" 
                                                            id="booking_info" 
                                                            title="{{__('View Booking Time')}}"
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
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
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
