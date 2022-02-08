@extends('frontend.user.dashboard.user-master')
@section('section')
    <div class="dashboard-form-wrapper">
        <div class="header-wrapp">
            <h4 class="header-title">{{__('Prescription Feedback List')}}  </h4>
            <div class="header-title">
                <button type="submit" class="btn btn-info" data-toggle="modal" data-target="#upload"><i class="fas fa-plus mr-2"></i>{{__('Upload Prescription')}}</button>
            </div>
        </div>
        <div class="table-responsive mt-3">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">{{__('Uploaded Prescription Info')}}</th>
                    <th scope="col">{{__('Guidelines / Feedback')}}</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($all_prescription as $data)
                    <tr>
                        <th scope="row">
                            <div class="user-dahsboard-order-info-wrap">
                            <small class="d-block"><strong>{{__('#Prescription ID :')}}</strong> {{$data->id}}</small>
                            <small class="d-block"><strong>{{__('Your Message:')}}</strong> {{purify_html($data->customer_message)}}</small>
                            <small class="d-block"><strong>{{__('Your Prescription:')}}</strong> <a href="{{asset(''.$data->customer_prescription)}}" target="_blank" class="btn btn-medheal btn-sm mr-1" title="{{__('View Document')}}">
                                <i class="fas fa-eye"></i> {{__('View')}}</a> </small>
                            <small class="d-block"><strong>{{__('Date Created:')}}</strong> {{date('D,d F Y',strtotime($data->created_at))}}</small>
                            </div>
                        </th>
                        <td>
                            <div class="user-dahsboard-order-info-wrap">
                            <small class="d-block">
                                @if($data->status == 'pending')
                                <span class="alert alert-warning text-capitalize alert-sm alert-small d-inline-block">{{__($data->status)}}</span>
                                @elseif($data->status == 'cancel')
                                <span class="alert alert-danger text-capitalize alert-sm alert-small d-inline-block">{{__($data->status)}}</span>
                                @elseif($data->status == 'replied')
                                <span class="alert alert-success text-capitalize alert-sm alert-small d-inline-block">{{__($data->status)}}</span>
                                @elseif($data->status == 'opened')
                                <span class="alert alert-info text-capitalize alert-sm alert-small d-inline-block">{{__($data->status)}}</span>
                                @endif
                            </small>
                            @if(!empty($data->admin_feedback_message))
                            <small class="d-block"><strong>{{__('Guideline :')}}</strong> {{purify_html($data->admin_feedback_message)}}</small>
                            @endif
                            @if(!empty($data->product_order_id))
                                <small class="d-block"><strong>{{__('Assigned Order ID:')}}</strong> #{{$data->order->id}}</small>
                                <small class="d-block"><strong>{{__('View Order:')}}</strong><a href="{{route('user.dashboard.product.order.view',$data->order->id)}}" target="_blank" class="btn btn-medheal btn-sm mr-1 ml-2"> <i class="fas fa-eye"></i> {{__('View')}}</a></a></small>
                                <small class="d-block"><strong>{{__('Order Status:')}}</strong>
                                    @if($data->order->status == 'pending')
                                        <span class="alert alert-warning text-capitalize alert-sm alert-small">{{__($data->order->status)}}</span>
                                    @elseif($data->order->status == 'cancel')
                                        <span class="alert alert-danger text-capitalize alert-sm alert-small">{{__($data->order->status)}}</span>
                                    @elseif($data->order->status == 'in_transit')
                                        <span class="alert alert-info text-capitalize alert-sm alert-small">{{str_replace('_',' ',__($data->order->status))}}</span>
                                    @elseif($data->order->status == 'shipped')
                                        <span class="alert alert-custom text-capitalize alert-sm alert-small">{{str_replace('_',' ',__($data->order->status))}}</span>
                                    @elseif($data->order->status == 'complete')
                                        <span class="alert alert-custom text-capitalize alert-sm alert-small">{{str_replace('_',' ',__($data->order->status))}}</span>
                                    @else
                                        <span class="alert alert-custom text-capitalize alert-sm alert-small">{{__($data->order->status)}}</span>
                                    @endif
                                </small>
                                @if($data->order->payment_status == 'complete')
                                    <form action="{{route('frontend.product.invoice.generate')}}"  method="post">
                                        @csrf
                                        <input type="hidden" name="order_id" id="invoice_generate_order_field" value="{{$data->order->id}}">
                                        <small class="d-block"><strong>{{__('Invoice Donwload:')}}</strong>
                                        <button class="btn btn-secondary btn-sm" type="submit"> <i class="fas fa-download"></i> {{__('Invoice')}}</button>
                                        </small>
                                    </form>
                                @endif
                                @if($data->order->payment_status == 'pending' && $data->order->status != 'cancel')
                                     <small class="d-block"><strong>{{__('Payment Status:')}}</strong>
                                        <span class="alert alert-warning text-capitalize alert-sm alert-small">{{__($data->order->payment_status)}}</span>
                                     </small>
                                     @if( $data->order->payment_gateway != 'cash_on_delivery' &&  $data->order->payment_gateway != 'manual_payment')
                                     
                                        <form action="{{route('frontend.products.checkout')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="order_id" value="{{$data->order->id}}">
                                            <input type="hidden" name="selected_payment_gateway" value="{{$data->order->payment_gateway}}">
                                            <input type="hidden" name="subtotal" value="{{$data->order->subtotal}}">
                                            <input type="hidden" name="total" value="{{$data->order->total}}">
                                            <input type="hidden" name="billing_name" value="{{$data->order->billing_name}}">
                                            <input type="hidden" name="billing_email" value="{{$data->order->billing_email}}">
                                            <input type="hidden" name="billing_phone" value="{{$data->order->billing_phone}}">
                                            <input type="hidden" name="billing_country" value="{{$data->order->billing_country}}">
                                            <input type="hidden" name="billing_street_address" value="{{$data->order->billing_street_address}}">
                                            <input type="hidden" name="billing_town" value="{{$data->order->billing_town}}">
                                            <input type="hidden" name="billing_district" value="{{$data->order->billing_district}}">
                                            <input type="hidden" name="billing_district" value="{{$data->order->billing_district}}">
                                            <small class="d-block"><strong>{{__('Order Payment:')}}</strong>
                                            <button type="submit" class="btn btn-sm btn-success">{{__('Pay Now')}}</button>
                                             </small>
                                        </form>
                                        
                                    @endif
                                    <form action="{{route('user.dashboard.product.order.cancel')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="order_id" value="{{$data->order->id}}">
                                        <small class="d-block"><strong>{{__('Order Cancel:')}}</strong>
                                        <button type="submit" class="btn btn-sm btn-danger mt-2 mb-2">{{__('Cancel')}}</button>
                                        </small>
                                    </form>
                                @else
                                <small class="d-block"><strong>{{__('Payment Status:')}}</strong>
                                    <span class="alert alert-custom text-capitalize alert-sm alert-small" >{{$data->order->payment_status}}</span>
                                </small>
                                @endif
                                
                            @endif
                            </div>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="blog-pagination">
            {{ $all_prescription->links() }}
        </div>
    <div class="modal fade" id="upload" aria-hidden="true">
        <div class="modal-dialog modal-lg margin-top-150">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Upload Prescription')}}</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="{{route('user.home.appointment.prescription.store')}}" method="post" enctype="multipart/form-data">@csrf
                    <div class="modal-body">
                        <input type="hidden" name="user_id" value="{{Auth::guard('web')->user()->id}}">
                        <input type="hidden" name="name" value="{{Auth::guard('web')->user()->name}}">
                        <input type="hidden" name="email" value="{{Auth::guard('web')->user()->email}}">
                        <input type="hidden" name="phone" value="{{Auth::guard('web')->user()->phone}}">
                        <div class="form-group">
                            <label for="">{{__('Enter Your Message')}}</label>
                            <textarea class="form-control" name="customer_message" id="" rows="7"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">{{__('Upload Prescription')}}</label>
                            <input type="file" name="customer_prescription" id="image" class="form-control" >
                        </div>
                        <div id="preview_image"></div>
                        <div class="card-footer"><small class="text text-danger"><sup>*</sup>{{__(' .jpg, .jpeg, .png ,.pdf')}} </small></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                        <button type="submit" id="submit" class="btn btn-primary">{{__('Submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('scripts')
<x-btn.submit/>
    <script>
        (function($){
        "use strict";
        $(document).ready(function () {
            function previewFile() {
                    var $preview = $('#preview_image').empty();
                    if (this.files) $.each(this.files, readAndPreview);
                    function readAndPreview(i, file) {
                    var reader = new FileReader();
                    $(reader).on("load", function() {
                        $preview.append($("<img/>", {src:this.result, height:100}));
                    });
                    reader.readAsDataURL(file);
                }
            }
            $('#image').on("change", previewFile);
        });
        })(jQuery);
    </script>
@endsection