<div class="info-bar">
    <div class="info-bar-bottom bg-white style-{{$home_variant_number}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="info-bar-inner">
                        <div class="left-content-area">
                            <div class="logo-wrapper">
                                <a href="{{ url('/')}} " class="logo">
                                    {!! render_image_markup_by_attachment_id(get_static_option('site_logo')) !!}
                                </a>
                            </div>
                        </div>
                        <div class="right-content-area style-01">
                            <div class="info-bottom-right">
                                @if(get_static_option('topbar_variant_home_'.$home_variant_number) == '02')
                                <ul class="info-items-03">
                                    @foreach ($all_infobar_items as $data)
                                        <li class="info-bar-item-03">
                                            <div class="icon">
                                                <i class="{{$data->icon}}"></i>
                                                <span class="title">{{$data->title}}</span>
                                            </div>
                                            <div class="content">
                                                <p class="details">{{$data->details}}</p>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                @else
                                <form class="search-form" action="index.html">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Search Products..">
                                    </div>
                                    <button class="search-btn"><i class="flaticon-search-1"></i></button>
                                </form>
                                @endif
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>