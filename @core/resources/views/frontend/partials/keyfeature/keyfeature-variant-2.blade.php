<div class="support-area padding-top-30">
    <div class="container">
        <div class="support-area-wrapper ">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="support-item-list">
                        @foreach ($all_key_features as $key => $data)
                        <li class="support-single-item">
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
</div>