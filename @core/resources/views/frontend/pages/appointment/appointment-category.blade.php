@extends('frontend.frontend-page-master')
@section('site-title')
    {{get_static_option('appointment_page_name')}} {{__('Category:')}} {{$cat_name}}
@endsection
@section('page-title')
    {{get_static_option('appointment_page_name')}} {{__('Category:')}} {{$cat_name}}
@endsection
@section('page-meta-data')
    <meta name="description" content="{{get_static_option('appointment_page_meta_description')}}">
    <meta name="tags" content="{{get_static_option('appointment_page_meta_tags')}}">
@endsection
@section('content')
    <section class="appointment-content-area padding-top-120 padding-bottom-90">
        <div class="container">
            <div class="row">
                        @forelse($all_appointment as $data)
                        <div class="col-lg-4">
                            <x-frontend.appointment.doctor
                                    :slug="$data->slug"
                                    :title="$data->title"
                                    :id="$data->id"
                                    :image="$data->image"
                                    :designation="$data->designation"
                                    :location="$data->location">
                            </x-frontend.appointment.doctor>
                        </div>
                        @empty
                        <div class="col-lg-12 text-center">
                           <div class="alert alert-warning">{{__('nothing found')}} <strong>{{$search_term}}</strong></div>
                        </div>
                        @endforelse
                <div class="col-lg-12 text-center">
                    <nav class="pagination-wrapper " aria-label="Page navigation ">
                        {{$all_appointment->links()}}
                    </nav>
                </div>
            </div>
        </div>
    </section>
@endsection
