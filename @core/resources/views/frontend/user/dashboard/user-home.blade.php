@extends('frontend.user.dashboard.user-master')
@section('section')
    <div class="row">
            <div class="col-lg-6">
                <div class="user-dashboard-card">
                    <div class="icon"><i class="fas fa-shopping-bag"></i></div>
                    <div class="content">
                        <h4 class="title">{{get_static_option('product_page_name')}} {{__('Order')}}</h4>
                        <span class="number">{{$product_orders}}</span>
                    </div>
                </div>
            </div>
            
            
    </div>
@endsection