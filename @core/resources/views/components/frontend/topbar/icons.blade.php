<div class="social-link">
    <ul>
        @foreach ($all_topbar_icons as $data)
            <li><a href="{{$data->url}}"><i class="{{$data->icon}}"></i></a></li>
        @endforeach
    </ul>
</div>