<div class="qualifed-area padding-top-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="single-icon-box-list-02">
                    @foreach ($all_key_features as $key => $data)
                        <li class="single-icon-box-02 style-0{{($key == '2')? 'style-01' : $key++ }}">
                            <div class="icon">
                                <i class="{{$data->icon}}"></i>
                            </div>
                            <div class="content">
                                <h4 class="title">{{$data->title}}</h4>
                                <p>{{$data->description}}</p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>