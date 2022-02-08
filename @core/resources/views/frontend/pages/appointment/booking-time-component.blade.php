@php 
if(isset($day_name) && (isset($item['booking_info'][$day_name]['status']) && $item['booking_info'][$day_name]['status'] != null)){
    $booking_ids =  explode(',',$item['booking_info'][$day_name]['booking_time_ids']); 
}else{
    $status = 'no';
    $booking_ids = [];
}
@endphp
<ul class="time-slot time">
    @foreach($all_booking_time as $key => $data)
    @if(in_array($data->id,$booking_ids))
    <li data-id="{{$data->id}}" >{{purify_html($data->time)}}</li>
    @endif
    @endforeach
    @if(isset($status))
    <li>{{__('No booking time available')}}</li>
    @endif
</ul>