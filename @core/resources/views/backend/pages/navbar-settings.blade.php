@extends('backend.admin-master')
@section('site-title')
    {{__('Navbar Settings')}}
@endsection
@section('content')
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12 mt-t">
                <div class="card">
                    <div class="card-body">
                        <x-msg.all/>
                        <h4 class="header-title">{{__('Navbar Settings')}}</h4>
                        <form action="{{route('admin.navbar.settings')}}" method="post" enctype="multipart/form-data">@csrf
                            <div class="form-group margin-top-30">
                                <label for="navbar_search_area ">{{__('Search Area')}}</label>
                                <label class="switch">
                                    <input type="checkbox" name="navbar_search_area" @if(!empty(get_static_option('navbar_search_area'))) checked @endif id="navbar_search_area">
                                    <span class="slider"></span>
                                </label>
                            </div>
                            <div class="form-group margin-top-30">
                                <label for="navbar_wishlist_area ">{{__('Wishlist Cart Icon')}}</label>
                                <label class="switch">
                                    <input type="checkbox" name="navbar_wishlist_area" @if(!empty(get_static_option('navbar_wishlist_area'))) checked @endif id="navbar_wishlist_area">
                                    <span class="slider"></span>
                                </label>
                            </div>
                            <div class="form-group margin-top-30">
                                <label for="navbar_shopping_area ">{{__('Shopping Cart Icon')}}</label>
                                <label class="switch">
                                    <input type="checkbox" name="navbar_shopping_area" @if(!empty(get_static_option('navbar_shopping_area'))) checked @endif id="navbar_shopping_area">
                                    <span class="slider"></span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="icon" class="d-block">{{__('Shopping Cart Icon')}}</label>
                                <div class="btn-group icon">
                                    <button type="button" class="btn btn-primary iconpicker-component">
                                        <i class="{{get_static_option('shopping_cart_icon')}}"></i>
                                    </button>
                                    <button type="button" class="icp icp-dd btn btn-primary dropdown-toggle"
                                            data-selected="{{get_static_option('shopping_cart_icon')}}" data-toggle="dropdown">
                                        <span class="caret"></span>
                                        <span class="sr-only">{{__("Toggle Dropdown")}}</span>
                                    </button>
                                    <div class="dropdown-menu"></div>
                                </div>
                                <input type="hidden" class="form-control"  id="icon" value="{{get_static_option('shopping_cart_icon')}}" name="shopping_cart_icon">
                            </div>
                            <div class="form-group">
                                <label for="icon" class="d-block">{{__('Wishlist Cart Icon')}}</label>
                                <div class="btn-group icon">
                                    <button type="button" class="btn btn-primary iconpicker-component">
                                        <i class="{{get_static_option('wishlist_cart_icon')}}"></i>
                                    </button>
                                    <button type="button" class="icp icp-dd btn btn-primary dropdown-toggle"
                                            data-selected="{{get_static_option('wishlist_cart_icon')}}" data-toggle="dropdown">
                                        <span class="caret"></span>
                                        <span class="sr-only">{{__("Toggle Dropdown")}}</span>
                                    </button>
                                    <div class="dropdown-menu"></div>
                                </div>
                                <input type="hidden" class="form-control"  id="icon" value="{{get_static_option('wishlist_cart_icon')}}" name="wishlist_cart_icon">
                            </div>
                            <button type="submit" id="update" class="btn btn-primary mt-4 pr-4 pl-4">{{__('Update Settings')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<x-icon-picker-js/>
<x-btn.update/>
@endsection

