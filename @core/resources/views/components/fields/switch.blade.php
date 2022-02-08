@switch($type)
    @case('enable')
        @php $class = 'slider-enable-disable' @endphp 
        @break
    @case('yes')
        @php $class = 'slider-yes-no' @endphp 
        @break
    @case('show')
        @php $class = 'slider onoff' @endphp 
        @break
    @default
    @php $class = 'slider onoff' @endphp
@endswitch
<div class="form-group">
    <label for="{{$name}}"><strong>{{$title}}</strong></label>
    <label class="switch yes">
        <input type="checkbox" name="{{$name}}" @if(!empty(get_static_option($name))) checked @endif >
        <span class="{{$class}}"></span>
    </label>
</div>