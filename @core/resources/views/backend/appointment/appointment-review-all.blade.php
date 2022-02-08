@extends('backend.admin-master')
@section('style')
    @include('backend.partials.datatable.style-enqueue')
    <link rel="stylesheet" href="{{asset('assets/backend/css/media-uploader.css')}}">
@endsection
@section('site-title')
    {{__('All Appointments Reviews')}}
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                <x-msg.success/>
                <x-msg.error/>
            </div>
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{__('All Appointments Reviews')}}</h4>
                        <x-action.bulk.nav/>
                        <div class="table-wrap table-responsive">
                            <table class="table table-default" id="all_blog_table">
                                <thead>
                                <th class="no-sort">
                                    <div class="mark-all-checkbox">
                                        <input type="checkbox" class="all-checkbox">
                                    </div>
                                </th>
                                <th>{{__('ID')}}</th>
                                <th>{{__('Appointment')}}</th>
                                <th>{{__('User')}}</th>
                                <th>{{__('Rating')}}</th>
                                <th>{{__('Message')}}</th>
                                <th>{{__('Action')}}</th>
                                </thead>
                                <tbody>
                                @foreach($all_reviews as $data)
                                    <tr class="{{$data->id}}">
                                        <td>
                                            <div class="bulk-checkbox-wrapper">
                                                <input type="checkbox" class="bulk-checkbox"
                                                       name="bulk_delete[]" value="{{$data->id}}">
                                            </div>
                                        </td>
                                        <td>{{$data->id}}</td>
                                        <td>{{$data->appointment->title ?? __('untitled')}}</td>
                                        <td>{{$data->user->name ?? __('Anonymous')}}</td>
                                        <td>
                                            @for( $i =1; $i <= $data->ratings; $i++ )
                                                <i class="fas fa-star"></i>
                                            @endfor
                                        </td>
                                        <td>{{$data->message}}</td>
                                        <td>
                                            <x-delete-popover :url="route('admin.appointment.review.delete',$data->id)"/>
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
@endsection
@section('script')
    @include('backend.partials.datatable.script-enqueue')
    <x-action.bulk.animate :url="route('admin.appointment.review.bulk.action')" />
@endsection
