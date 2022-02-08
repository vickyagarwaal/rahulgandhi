<div class="service-gallery-area bg-grey bg-image padding-bottom-120 padding-top-120" {!! render_background_image_markup_by_attachment_id(get_static_option('site_image_gallery_bg_img')) !!}>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="section-title white b-top desktop-center padding-top-25 margin-bottom-55">
                    <h3 class="title">{{get_static_option('site_image_gallery_title')}}</h3>
                    <p>{{get_static_option('site_image_gallery_description')}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="service-gallery-masonry-wrapper">
                    <div class="col-md-12">
                        <ul class="service-gallery-menu">
                            <li class="active" data-filter="*">{{__('All')}} <span>/</span> </li>
                            @php $count_check = (count($image_gallery_category)-1); @endphp
                            @foreach($image_gallery_category as $key => $data)
                               <li data-filter=".{{Str::slug($data->title)}}">{{$data->title}} @if($key < $count_check)<span>/</span>@endif</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="service-gallery-masonry">
                        @foreach($all_gallery_images as $data)
                        <div class="col-lg-3 col-md-4 col-sm-6 masonry-item {{Str::slug(get_image_category_name_by_id($data->cat_id))}}">
                            <div class="service-gallery-single-item">
                                <div class="thumb">
                                    {!! render_image_markup_by_attachment_id($data->image,'','grid') !!}
                                    @php
                                           $gallery_img = get_attachment_image_by_id($data->image,'large',false);
                                           $img_url = !empty($gallery_img) ? $gallery_img['img_url'] : '';
                                    @endphp
                                    <div class="content">
                                        <div class="icon">
                                            <a class="image-popup" href="{{$img_url}}"> +</a>
                                        </div>
                                        <a href="">
                                            <h3 class="title">{{$data->title}}</h3>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>