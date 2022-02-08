@extends('frontend.frontend-page-master')
@section('site-title')
    {{get_static_option('about_page_name')}}
@endsection
@section('page-title')
    {{get_static_option('about_page_name')}}
@endsection
@section('page-meta-data')
<meta name="description" content="{{get_static_option('about_page_meta_description')}}">
<meta name="tags" content="{{get_static_option('about_page_meta_tags')}}">
@endsection
@section('content')
<section class="our_story">
<div class="container">
<div class="row">
<div class="col-md-6 col-lg-12 ">
<div class=" powering">
<h4>Our Story</h4>
</div>
<div class="row powering2">

<p>HempButi is dedicted in providing quality CBD hemp products to consumers in India. Our mission is simple: To Serve. We embarked on this journey with four simple concepts, which quickly evolved into the pillars and backbone of which HempButii is made: Transparency, Education, Quality & Affordability.
</p>
</div>
</div>

</div>
</div>
</section>
@if (get_static_option('about_page_concern_section_status'))
    @include('frontend.partials.about-us.concern-area')
@endif
<section class="our_story">
<div class="container">
<div class="row">
<div class="col-md-6 col-lg-12 ">
<div class=" powering">
<h4>HempButii CBD Gold Standard 
</h4>
</div>
<div class=" powering2">
<p>Our drive comes from those who have trusted us and in return have found relief. Our passion is found in our CBD hemp products and can be seen through our vigorous product development process. We believe in never cutting corners in any aspect from manufacturing to customer service and we strive to provide our customers with only the best. Our use of pure and potent ingredients, proprietary blends, multi-level third-party testing and QR codes on every product that links directly to lab results for specific batches, are a testament of our commitment to our loyal customers. We lead the industry in transparency and are always one step ahead in our product innovation. We are dedicated to providing the best CBD hemp products possible. 
We believe CBD hemp has the potential to change the world around us, and we are proud to help millions of people discover the benefits of this miraculous plant. We hope you will join the HempButi family today. 
</p>

<div class=" powering">
<h4>What is the HempButii Gold Standard? 
</h4>
</div>
<ul class="transparency">
<li>
    <b>Transparency:</b> We take pride in providing transparency in every step of the manufacturing process to ensure you know exactly what to expect from our broad-spectrum CBD products. </li>

<li><b>Consumer Education:</b> We understand that knowledge is truly power, that's why we provide our customer base with an ample amount of information from our weekly blog posts to our monthly newsletters we have you covered. </li>
<li>
<b>Quality Products:</b> The quality of our product is second to none, using only the cleanest ingredients and processes to ensure an effective product. Better Process. Better Product.</li>
<li>
<b>Economically Priced:</b> CBD can get expensive, and we understand that our customers use our products for their medicinal value. That's why we take pride in providing our customers with one of the most economically priced broad-spectrum products on the CBD marketplace.</li></ul>

<div class=" powering">
<h4>Why HempButii?</h4>

<p>HempButii manufacturers CBD to enhance everyday wellness. After all, Health is Wealth. We strive to make everyday life better for our wide array of customers: The athlete who needs to push their body to the next level. The business person who needs that extra level of focus to get through the day. The grandparents with discomfort. The innovator needs a break in the middle of the day. We believe everyone should have the ability to be their best version of themselves.</p>
</div>
</div>
</div>

</div>
</div>
</section>

@endsection
