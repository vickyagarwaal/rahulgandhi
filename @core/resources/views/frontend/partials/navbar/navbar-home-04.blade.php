<nav class="navbar navbar-area navbar-expand-lg has-topbar-04 bg-white nav-style-02">
    <div class="container nav-container">
        <div class="responsive-mobile-menu">
            <div class="logo-wrapper">
                <a href="{{ route('homepage') }}" class="logo">
                    {!! render_image_markup_by_attachment_id(get_static_option('site_logo')) !!}
                </a>
            </div>
            <div class="mobile-cart"><a href="{{route('frontend.products.cart')}}"><i class="flaticon-shopping-cart"></i> <span class="pcount">{{cart_total_items()}}</span></a></div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bizcoxx_main_menu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    </div>
    <div class="collapse navbar-collapse" id="bizcoxx_main_menu">
            <ul class="navbar-nav">
                
    <li> 
        <a href="{{url('/')}}">Home</a>
</li>
<li> 
        <a href="{{url('/product')}}">CBD OIL TINCTURES</a>
</li>
    



<li class=" menu-item-has-children "> 
        <a href="#">User</a>
<ul class="sub-menu">
@if(!Auth::check())
    <li><a href="{{url('/login')}}">Login </li>
        <li><a href="{{url('/register')}}">Regsiter </li>

            @else
     <li><a href="{{ url('/user-home') }}">Dashboard</a></li>
                  @endif

</ul>
</li>
    
            </ul>
        </div>
      
        <div class="nav-right-content">
            <div class="icon-part">
                <ul>
                    {!! \App\Helpers\RenderHelpers::wishlistCountMarkup() !!}
                    {!! \App\Helpers\RenderHelpers::cartCountMarkup() !!}
                </ul>
            </div>
        </div>
    </div>
</nav>



