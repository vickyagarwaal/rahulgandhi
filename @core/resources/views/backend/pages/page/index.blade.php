@extends('backend.admin-master')
@section('site-title')
    {{__('All Pages')}}
@endsection
@section('style')
<x-datatable.css/>
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <x-msg.all/>
                        <div class="header-wrapp">
                            <h4 class="header-title">{{__('All Pages')}}  </h4>
                            <div class="header-title">
                                <a href="{{ route('admin.page.new') }}" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Add New Page')}}</a>
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
                                <th>{{__('Date')}}</th>
                                <th>{{__('Status')}}</th>
                                <th>{{__('Action')}}</th>
                                </thead>
                                <tbody>
                                    @foreach($all_pages as $data)
                                        <tr class="{{ $data['id']}}">
                                            <td><x-bulk-delete-checkbox :id="$data->id"/></td>
                                            <td>{{$data->id}}</td>
                                            <td>{{($data->title) ?? __('Untitled')}}</td>
                                            <td>{{$data->created_at->diffForHumans()}}</td>
                                            <td><x-status-span :status="$data->status"/></td>
                                            <td>
                                                <x-delete-popover :url="route('admin.page.delete',$data->id)"/>
                                                <x-edit-icon :url="route('admin.page.edit',$data->id)"/>
                                                <x-view-icon :url="route('frontend.dynamic.page',['slug'=>$data->slug,'id'=>$data->id])"/>
                                                <x-action.clone :action="route('admin.page.clone',['slug' => $data->slug, 'id' => $data->id])" :id="'$data->id'"/>
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
<x-datatable.js/>
<x-action.bulk.animate :url="route('admin.page.bulk.action')"/>
@endsection
