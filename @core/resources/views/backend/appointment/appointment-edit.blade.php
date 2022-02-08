@extends('backend.admin-master')
@section('site-title')
    {{__('Edit Doctor Details')}}
@endsection
@section('style')
<x-summernote.css/>
<x-media.css/>
<link rel="stylesheet" href="{{asset('assets/backend/css/bootstrap-tagsinput.css')}}">
<link rel="stylesheet" href="{{asset('assets/backend/css/bootstrap-datepicker.min.css')}}">
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
                        <div class="header-wrap d-flex justify-content-between">
                            <h4 class="header-title">{{__('Edit Doctor Appointment')}}</h4>
                            <a href="{{route('admin.appointment.all')}}" class="btn btn-info">{{__('All Appointments')}}</a>
                        </div>
                        <form action="{{route('admin.appointment.update')}}" method="post" enctype="multipart/form-data">@csrf
                            <input type="hidden" name="id" value="{{$edit_items->id}}">
                            <div class="form-group">
                                <label for="title">{{__('Doctor Name')}}</label>
                                <input type="text" class="form-control" name="title" value="{{$edit_items->title}}" placeholder="{{__('Title')}}">
                            </div>
                            <div class="form-group">
                                <label for="designation">{{__('Designation')}}</label>
                                <input type="text" class="form-control" name="designation" value="{{$edit_items->designation}}" placeholder="{{__('Designation')}}">
                            </div>
                            <div class="form-group">
                                <label>{{__('Description')}}</label>
                                <input type="hidden" name="description" value="{{$edit_items->description}}">
                                <div class="summernote" data-content="{{ $edit_items->description }}"></div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 ">
                                    <label for="location">{{__('Location')}}</label>
                                    <input type="text" name="location"  value="{{$edit_items->location}}" class="form-control">
                                </div>
                                <div class="form-group col-md-6 ">
                                    <label for="slug">{{__('Slug')}}</label>
                                    <input type="text" class="form-control" name="slug" value="{{$edit_items->slug}}" placeholder="{{__('Slug')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="short_description">{{__('Short Description')}}</label>
                                <textarea name="short_description" cols="30" rows="5" class="form-control">{{$edit_items->short_description}}</textarea>
                            </div>
                            <div class="iconbox-repeater-wrapper dynamic-repeater">
                                <label for="additional_info" class="d-block">{{__('Additional Info')}}</label>
                                @forelse(($edit_items->additional_info) as $val)
                                <div class="all-field-wrap">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="additional_info[]"  value="{{$val}}">
                                        </div>
                                    <div class="action-wrap">
                                        <span class="add"><i class="ti-plus"></i></span>
                                        <span class="remove"><i class="ti-trash"></i></span>
                                    </div>
                                </div>
                                @empty
                                    <div class="all-field-wrap">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="additional_info[]"  placeholder="{{__('Additional info')}}">
                                        </div>
                                        <div class="action-wrap">
                                            <span class="add"><i class="ti-plus"></i></span>
                                            <span class="remove"><i class="ti-trash"></i></span>
                                        </div>
                                    </div>
                                @endforelse
                            </div>
                            <div class="iconbox-repeater-wrapper  dynamic-repeater">
                                <label for="experience_info" class="d-block">{{__('Experience Info')}}</label>
                                @forelse(($edit_items->experience_info) as $val)
                                <div class="all-field-wrap">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="experience_info[]" value="{{$val}}">
                                    </div>
                                    <div class="action-wrap">
                                        <span class="add"><i class="ti-plus"></i></span>
                                        <span class="remove"><i class="ti-trash"></i></span>
                                    </div>
                                </div>
                                @empty
                                    <div class="all-field-wrap">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="experience_info[]" placeholder="{{__('Experience Info')}}">
                                        </div>
                                        <div class="action-wrap">
                                            <span class="add"><i class="ti-plus"></i></span>
                                            <span class="remove"><i class="ti-trash"></i></span>
                                        </div>
                                    </div>
                                @endforelse
                            </div>
                            <div class="iconbox-repeater-wrapper  dynamic-repeater">
                                <label for="specialized_info" class="d-block">{{__('Specialized Info')}}</label>
                                @forelse(($edit_items->specialized_info) as $val)
                                <div class="all-field-wrap">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="specialized_info[]" value="{{$val}}">
                                    </div>
                                    <div class="action-wrap">
                                        <span class="add"><i class="ti-plus"></i></span>
                                        <span class="remove"><i class="ti-trash"></i></span>
                                    </div>
                                </div>
                                    @empty
                                    <div class="all-field-wrap">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="specialized_info[]" placeholder="{{__('Specialized Info')}}">
                                        </div>
                                        <div class="action-wrap">
                                            <span class="add"><i class="ti-plus"></i></span>
                                            <span class="remove"><i class="ti-trash"></i></span>
                                        </div>
                                    </div>
                                @endforelse
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="meta_title">{{__('Meta Title')}}</label>
                                    <input type="text" name="meta_title" value="{{$edit_items->meta_title}}" class="form-control" >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="og_meta_title">{{__('OG Meta Title')}}</label>
                                    <input type="text" name="og_meta_title" value="{{$edit_items->og_meta_title}}" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="meta_description">{{__('Meta Description')}}</label>
                                    <textarea name="meta_description" class="form-control" rows="5" id="meta_description">{{$edit_items->meta_description}}</textarea>
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label for="og_meta_description">{{__('OG Meta Description')}}</label>
                                    <textarea name="og_meta_description" class="form-control" rows="5" id="og_meta_description">{{$edit_items->og_meta_description}}</textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="meta_tags">{{__('Meta Tags')}}</label>
                                    <input type="text" name="meta_tags" class="form-control" data-role="tagsinput"
                                        id="meta_tags" value="{{$edit_items->meta_tags}}" >
                                </div>
                                <div class="form-group col-md-6 col-lg-6">
                                    <label for="og_meta_image">{{__('OG Meta Image')}}</label>
                                    <div class="media-upload-btn-wrapper">
                                        <div class="img-wrap">
                                            @php
                                                $image = get_attachment_image_by_id($edit_items->og_meta_image,null,true);
                                                $image_btn_label = 'Upload Image';
                                            @endphp
                                            @if (!empty($image))
                                                <div class="attachment-preview">
                                                    <div class="thumbnail">
                                                        <div class="centered">
                                                            <img class="avatar user-thumb" src="{{$image['img_url']}}" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                                @php  $image_btn_label = 'Change Image'; @endphp
                                            @endif
                                        </div>
                                        <input type="hidden" id="og_meta_image" name="og_meta_image" value="{{$edit_items->og_meta_image}}">
                                        <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="{{__('Select Image')}}" data-modaltitle="{{__('Upload Image')}}" data-toggle="modal" data-target="#media_upload_modal">
                                            {{__($image_btn_label)}}
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="category">{{__('Category')}}</label>
                                <select name="categories_id" class="form-control" id="category">
                                    <option value="">{{__("Select Category")}}</option>
                                    @foreach($appointment_category as $category)
                                        <option @if($category->id == $edit_items->categories_id) selected @endif  value="{{$category->id}}">{{purify_html($category->name)}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th colspan="3">{{__('Booking Availablity Information')}}</th>
                                        </tr>
                                        <tr>
                                            <th>{{__('Day')}}</th>
                                            <th>{{__('Availablity')}}</th>
                                            <th>{{__('Booking Time')}}</th>
                                        </tr>
                                    </thead>
                                    @php
                                        $booking_infos = ['saturday','sunday','monday','tuesday','wednesday','thursday','friday'];
                                    @endphp
                                    <tbody>
                                        @if($edit_items->booking_info != null)
                                        @foreach($booking_infos as $week_day_name)
                                            <tr>
                                                <td scope="row">{{__(Str::ucfirst($week_day_name))}}</td>
                                                <td>
                                                    <label class="switch">
                                                    <input type="checkbox" @if(isset($edit_items['booking_info'][$week_day_name]['status']) && $edit_items['booking_info'][$week_day_name]['status'] === 'on') checked @endif name="booking_info[{{$week_day_name}}][status]">
                                                    <span class="slider-yes-no"></span></label>
                                                </td>
                                                @php $booking_ids =  explode(',',$edit_items['booking_info'][$week_day_name]['booking_time_ids']);@endphp
                                                <td>
                                                    <input type="hidden" id="booking_time_ids" value="{{implode(',',$booking_ids)}}" name="booking_info[{{$week_day_name}}][booking_time_ids]">
                                                    <ul class="time_slot">
                                                        @forelse($all_booking_time as $key => $data)
                                                        <li data-id="{{$data->id}}" @if(in_array($data->id,$booking_ids)) class="selected" @endif>{{purify_html($data->time)}}</li>
                                                        @empty
                                                        <li>{{__('add appointment time first')}}</li>
                                                        @endforelse
                                                    </ul>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @else
                                        @foreach($booking_infos as $week_day_name)
                                        <tr>
                                            <td scope="row">{{__(Str::ucfirst($week_day_name))}}</td>
                                            <td>
                                                <label class="switch">
                                                <input type="checkbox" name="booking_info[{{$week_day_name}}][status]">
                                                <span class="slider-yes-no"></span></label>
                                            </td>
                                            <td>
                                                <input type="hidden" id="booking_time_ids" name="booking_info[{{$week_day_name}}][booking_time_ids]">
                                                <ul class="time_slot">
                                                    @forelse($all_booking_time as $data)
                                                        <li data-id="{{$data->id}}">{{purify_html($data->time)}}</li>
                                                    @empty
                                                        <li>{{__('add appointment time first')}}</li>
                                                    @endforelse
                                                </ul>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="form-group">
                                <label for="appointment_status"><strong>{{__('Available For Appointment')}}</strong></label>
                                <label class="switch">
                                    <input type="checkbox" @if($edit_items->appointment_status === 'yes') checked @endif name="appointment_status">
                                    <span class="slider-yes-no"></span>
                                </label>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="max_appointment">{{__('Max Appointment')}}</label>
                                    <input type="number" name="max_appointment" class="form-control" value="{{$edit_items->max_appointment}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="price">{{__('Price')}}</label>
                                    <input type="number" name="price" class="form-control" value="{{$edit_items->price}}">
                                </div>
                            </div>
                            <x-fields.image :name="'image'" :id="$edit_items->image" :title="__('Image')" :dimentions="'350 x 500'"/>
                            <x-fields.status :name="'status'" :title="__('Status')" :value="$edit_items->status"/>
                            <button type="submit" id="update" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Update')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-media.markup/>
@endsection
@section('script')
<x-btn.update/>
<x-repeater/>
    <script>
    (function ($){
            "use strict";
        $(document).ready(function () {
            $(document).on('click','ul.time_slot li',function (e){
                e.preventDefault();
                //prent selector
                var parent = $(this).parent().parent();
                //append input field value by this id
                var ids = parent.find('input[id="booking_time_ids"]');
                var oldValue = ids.val()
                //assign new value =
                var id = $(this).data('id');
                if(oldValue != ''){
                    var oldValAr = oldValue.split(',');
                    if($(this).hasClass('selected')){
                        var oldValAr = oldValAr.filter(function (item){return item != id;});
                    }else{
                        oldValAr.push(id);
                    }
                    ids.val(oldValAr.toString());
                }else{
                    ids.val(id);
                }
                //add class for this li
                $(this).toggleClass('selected');
            });
        });
    })(jQuery)
    </script>
    <x-summernote.js/>
    <x-media.js/>
    <script src="{{asset('assets/backend/js/bootstrap-tagsinput.js')}}"></script>
@endsection
