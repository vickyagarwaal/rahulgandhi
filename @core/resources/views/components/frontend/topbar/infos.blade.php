@foreach ($all_topbar_infos as $data)
   <li><a href="#"><i class="{{$data->icon}}"></i>{{$data->details}}</a></li>
@endforeach