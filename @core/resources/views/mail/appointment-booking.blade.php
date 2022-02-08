<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <title>{{get_static_option('site_title')}} {{__('Mail')}}</title>

    <style>
        *{
            font-family: 'Open Sans', sans-serif;
        }
        .mail-container {
            max-width: 650px;
            margin: 0 auto;
            text-align: center;
        }

        .mail-container .logo-wrapper {
            background-color: {{get_static_option('site_main_color_two')}};
            padding: 20px 0 20px;
        }
        table {
            margin: 0 auto;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }

        table td, table th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        table tr:nth-child(even){background-color: #f2f2f2;}

        table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #f2f2f2;
            color: #333;
            text-transform: capitalize;
        }
        footer {
            margin: 20px 0;
            font-size: 14px;
        }
        .product-thumbnail img {
            max-width: 150px;
        }
        .product-title {
            text-align: left;
            font-weight: 500;
        }
        .billing-wrap,
        .shipping-wrap{
            text-align: left;
        }
        .subtitle {
            font-size: 20px;
            line-height: 30px;
            font-weight: 600;
        }
        .billing-wrap ul,
        .shipping-wrap ul{
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .billing-wrap ul li,
        .shipping-wrap ul li{
            margin: 5px 0;
        }
        .billing-wrap ul li strong,
        .shipping-wrap ul li strong{
            min-width: 100px;
            display: inline-block;
            position: relative;
        }

        .billing-wrap ul li strong:after ,
        .shipping-wrap ul li strong:after {
            position: absolute;
            right: 0;
            top: 0;
            content: ":";
        }
        .order-summery{
            margin-top: 40px;
            background-color: #f6f8ff;
            padding: 30px;
            text-align: left;
        }
        .order-summery table{
            text-align: left;
        }
        .extra-data {
            text-align: left;
            margin-bottom: 40px;
        }

        .extra-data ul {
            padding: 0;
            list-style: none;
            margin: 20px 0;
        }

        .extra-data ul li {
            margin-top: 14px;
        }
        .description h4 {
            font-size: 24px;
            margin-bottom: 5px;
            line-height: 34px;
        }

        .description p {
            margin: 0;
            margin-bottom: 40px;
            color: #f36d2e;
        }
        .brief-wrapper p {
            margin: 0;
            margin-bottom: 10px;
            font-size: 16px;
            font-weight: 500;
            line-height: 26px;
        }

        .brief-wrapper {
            background-color: #f6f8ff;
            padding: 30px;
            text-align: left;
            margin-bottom: 40px;
        }
        .customer-data .subtitle {
            margin-top: 0;
        }
        .customer-data {
            display: flex;
            justify-content: space-between;
            background-color: #f6f8ff;
            padding: 30px;
            margin-bottom: 50px;
        }
        .product-info-wrap {
            text-align: left;
            padding: 20px;
            padding-top: 0;
        }

        .product-info-wrap h4 {
            font-size: 18px;
            line-height: 20px;
            margin-bottom: 20px;
        }

        .product-info-wrap .pdetails {
            font-size: 14px;
            display: block;
            line-height: 20px;
            margin-bottom: 2px;
        }
        .product-info-wrap h4 a {
            color: #333;
        }
        .order-summery h2 {
            margin: 0;
        }
        .pdetails-mod{
            color: red;
        }
    </style>
</head>
<body>
<div class="mail-container">
    <div class="logo-wrapper">
        <a href="{{url('/')}}">
            {!! render_image_markup_by_attachment_id(get_static_option('site_white_logo')) !!}
        </a>
    </div>
    @if($type == 'customer')
        <div class="description">
            <h4>{{__('Your Appointment has been Booked')}}</h4>
            <p>{{__('Appointment ID')}} #{{$data->id}}</p>
        </div>
        <div class="brief-wrapper">
            <p> {{__('Hey')}} {{$data->billing_name}}</p>
            <p>{{__('Your appointment')}} #{{$data->id}} {{__('has been booked on')}} {{$data->booking_date}} {{__('via')}} {{ucwords(str_replace('_',' ',$data->payment_gateway))}}. {{__('We will get back to you soon!')}}</p>
        </div>
    @else
        <div class="description">
            <h4>{{__('Your have a new Appointment Booking')}}</h4>
            <p>{{__('Appointment ID')}} #{{$data->id}}</p>
        </div>
        <div class="brief-wrapper">
            <p> {{__('Hey')}} </p>
            <p>{{__('Your have an Appointment')}} #{{$data->id}} {{__('on')}} {{$data->booking_date}} {{__('via')}} {{ucwords(str_replace('_',' ',$data->payment_gateway))}}.</p>
        </div>
    @endif
    <div class="order-summery">
        <h2 class="title">{{__('Appointment Booking Summary')}}</h2>
        <table>
            <tr>
                <td><strong>{{__('Appointment ID')}}</strong></td>
                <td><strong>{{'#'.$data->id}}</strong></td>
            </tr>
            <tr>
                <td><strong>{{__('Appointment Title')}}</strong></td>
                <td><strong>{{$data->appointment->title ?? __('Untitled')}}</strong></td>
            </tr>
            <tr>
                <td><strong>{{__('Appointment Date')}}</strong></td>
                <td><strong> {{date('D,d F Y',strtotime($data->booking_date))}}</strong></td>
            </tr>
            <tr>
                <td><strong>{{__('Appointment Time')}}</strong></td>
                <td><strong>{{$data->booking_time->time ?? __('Not Set')}}</strong></td>
            </tr>
            <tr>
                <td><strong>{{__('Payment Gateway')}}</strong></td>
                <td><strong>{{$data->payment_gateway}}</strong></td>
            </tr>
            <tr>
                <td><strong>{{__('Payment Status')}}</strong></td>
                <td><strong>{{$data->payment_status}}</strong></td>
            </tr>
            <tr>
                <td><strong>{{__('Booking Status')}}</strong></td>
                <td><strong>{{$data->status}}</strong></td>
            </tr>
            <tr>
                <td><strong>{{__('Total Amount')}}</strong></td>
                <td><strong>{{amount_with_currency_symbol($data->total)}}</strong></td>
            </tr>
        </table>
    </div>
    <footer>
        <p> {!! get_footer_copyright_text() !!}</p>
    </footer>
</div>
</body>
</html>
