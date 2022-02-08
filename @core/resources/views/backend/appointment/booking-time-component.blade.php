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