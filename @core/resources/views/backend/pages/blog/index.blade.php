@extends('backend.admin-master')
@section('site-title')
    {{__('Blog Page')}}
@endsection
@section('style')
<x-datatable.css/>
<x-media.css/>
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12 mt-t">
                <div class="card">
                    <div class="card-body">
                        <x-msg.all/>
                        <div class="header-wrapp">
                            <h4 class="header-title">{{__('All Blog Items')}}  </h4>
                            <div class="header-title">
                                <a href="{{ route('admin.blog.new') }}" id="add_post" class="btn btn-primary mt-4 pr-4 pl-4"> <i class="fas fa-plus mr-1"></i> {{__('Add New Post')}}</a>
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
                                    <th>{{__('Category')}}</th>
                                    <th>{{__('Author')}}</th>
                                    <th>{{__('Date Created')}}</th>
                                    <th>{{__('Status')}}</th>
                                    <th>{{__('Action')}}</th>
                                </thead>
                                <tbody>
                                @foreach($all_blogs as $data)
                                    <tr class="{{$data->id}}">
                                        <td><x-bulk-delete-checkbox :id="$data->id"/></td>
                                        <td>{{$data->id}}</td>
                                        <td>{{$data->title}}</td>
                                        <td> 
                                            @php $img = get_attachment_image_by_id($data->image,null,true); @endphp
                                             @if (!empty($img))
                                                <div class="attachment-preview">
                                                    <div class="thumbnail">
                                                        <div class="centered">
                                                            <img class="avatar user-thumb" src="{{$img['img_url']}}" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                                @php  $img_url = $img['img_url']; @endphp
                                            @endif
                                        </td>
                                        <td>{{$data->category ? $data->category->name : __('Untitled')}}</td>
                                        <td>{{$data->author ??__('Anonymous')}}</td>
                                        <td>{{date('d M, Y',strtotime($data->created_at))}}</td>
                                        <td><x-action.status :status="$data->status"/></td>
                                        <td>
                                            <x-action.delete :url="route('admin.blog.delete',$data->id)"/>
                                            <x-action.edit :url="route('admin.blog.edit',$data->id)"/>
                                            <x-action.view :url="route('frontend.blog.single',['slug' => $data->slug, 'id' => $data->id])"/>
                                            <x-action.clone :action="route('admin.blog.clone',['slug' => $data->slug, 'id' => $data->id])" :id="'$data->id'"/>
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
<x-media.js/>
<x-action.bulk.animate :url="route('admin.blog.bulk.action')"/>
@endsection
