@extends('backend.admin-master')
@section('style')
<x-datatable.css/>
@endsection
@section('site-title')
    {{__('All Prescriptions')}}
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <x-msg.all/>
                        <div class="header-wrapp">
                            <h4 class="header-title">{{__('All Prescriptions')}}  </h4>
                        </div>
                        <x-bulk-action/>
                        <div class="table-wrap table-responsive">
                            <table class="table table-default" id="all_blog_table">
                                <thead>
                                <th class="no-sort">
                                    <div class="mark-all-checkbox">
                                        <input type="checkbox" class="all-checkbox">
                                    </div>
                                </th>
                                <th>{{__('ID')}}</th>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Email')}}</th>
                                <th>{{__('Message')}}</th>
                                <th>{{__('Prescription')}}</th>
                                <th>{{__('Date')}}</th>
                                <th>{{__('Status')}}</th>
                                <th>{{__('Action')}}</th>
                                </thead>
                                <tbody>
                                @foreach($all_prescriptions as $data)
                                    <tr class="{{$data->id}}">
                                        <td>
                                            <div class="bulk-checkbox-wrapper">
                                                <input type="checkbox" class="bulk-checkbox"
                                                       name="bulk_delete[]" value="{{$data->id}}">
                                            </div>
                                        </td>
                                        <td>{{$data->id}}</td>
                                        <td>{{$data->name ?? __("Anonymous")}}</td>
                                        <td>{{$data->email ?? __("Anonymous") }}</td>
                                        <td>{{ Str::limit(strip_tags($data->customer_message), 20, '...' )}}</td>
                                        <td><a href="{{asset(''.$data->customer_prescription)}}" target="_blank" class="btn btn-lg btn-info btn-sm mb-3 mr-1" title="{{__('Download Document')}}">
                                            <i class="ti-eye"></i> {{__('View')}}</td>
                                        <td>{{date('D,d F Y',strtotime($data->created_at))}}</td>
                                        <td><x-status-span :status="$data->status"/></td>
                                        <td>
                                            <x-delete-popover :url="route('admin.prescription.delete',$data->id)"/>
                                            <a class="btn btn-success btn-xs mb-3 mr-1" target="_blank" href="{{route('admin.prescription.guideline',$data->id)}}" >
                                                {{__('Reply Prescription')}}<i class="fas fa-reply ml-2"></i> 
                                            </a>
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
    </div>
@endsection
@section('script')
<x-datatable.js/>
<x-action.bulk.animate :url="route('admin.prescription.bulk.action')" />
@endsection
