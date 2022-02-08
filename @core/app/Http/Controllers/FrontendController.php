<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Appointment;
use App\Mail\BasicMail;
use App\Page;
use App\Blog;
use App\BlogCategory;
use App\Counterup;
use App\Faq;
use App\HeaderBottom;
use App\KeyFeatures;
use App\Prescription;
use App\PricePlan;
use App\HeaderSlider;
use App\ImageGallery;
use App\ImageGalleryCategory;
use App\Keyfeature;
use App\Language;
use App\Mail\AdminResetEmail;
use App\MedicalCareInfo;
use App\Order;
use App\PaymentLogs;
use App\ProductCategory;
use App\ProductOrder;
use App\ProductRatings;
use App\Products;
use App\ProductShipping;
use App\ProgressBar;
use App\ServiceCategory;
use App\Services;
use App\TeamMember;
use App\User;
use App\Testimonial;
use App\WhyChooseUs;
use Illuminate\Database\Eloquent\Model;
use Mews\Purifier\Facades\Purifier;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class FrontendController extends Controller
{
    public function index()
    {
        $home_page_variant = get_static_option('home_page_variant');
        $all_header_bottom_items = HeaderBottom::where('home_variant',$home_page_variant)->get();
        $all_medical_care_items = MedicalCareInfo::where('type','medical_care')->get();
        $all_opening_hour_items = MedicalCareInfo::where('type','opening_hour')->get();
        $all_testimonial = Testimonial::take(get_static_option('home_page_testimonial_section_home_'.$home_page_variant.'_display_items'))->get();
        $header_sliders = HeaderSlider::all();
        $all_counterups  = Counterup::take(3)->get();
        // image gallery start ---------
        $all_gallery_images = ImageGallery::take(get_static_option('site_image_gallery_post_items'))->get();
        $all_image_contain_cat = $all_gallery_images->map(function ($item){
            return $item->cat_id;
        });
        $image_gallery_category = ImageGalleryCategory::find($all_image_contain_cat);
        // image gallery end ----------
        $all_latest_blogs = Blog::where('status', 'publish')->orderBy('id', 'desc')->take(get_static_option('home_page_latest_blog_section_display_item'))->get();
        $all_services = Services::where('status', 'publish')->orderBy('id', 'desc')->take(get_static_option('home_page_what_we_do_section_display_item_home_'.$home_page_variant.''))->get();
        $all_key_features = Keyfeature::where('variant',(in_array($home_page_variant, ['01','02'])) ? 'one' : 'two')->orderBy('id', 'desc')->take(3)->get();
        // product by category start ---------
        $all_products = Products::where('status','publish')->take(get_static_option('home_page_product_category_section_display_item_home_'.$home_page_variant.''))->get();
        $all_products_contain_cat = $all_products->map(function ($item){
            return $item->category_id;
        });
        $products_category = ProductCategory::find($all_products_contain_cat);
        // product by category end ---------
        $all_popular_products = Products::where('status','publish')->orderBy('total_sold','desc')->take(get_static_option('home_page_popular_product_section_display_item_home_'.$home_page_variant.''))->get();
        $all_featured_products = Products::where(['status'=>'publish','is_featured'=>'on'])->take(get_static_option('home_page_featured_product_section_display_item_home_'.$home_page_variant.''))->get();
        $all_best_seller_product = Products::where(['status'=>'publish'])->take(get_static_option('home_page_best_seller_product_section_display_item_home_'.$home_page_variant.''))->get();
        $all_appointment = Appointment::where(['status'=>'publish','appointment_status'=>'yes'])->take(get_static_option('home_page_appointment_section_display_item'))->get();

        return view('frontend.frontend-home')->with([
            'header_sliders' => $header_sliders,
            'all_header_bottom_items' => $all_header_bottom_items,
            'all_medical_care_items' => $all_medical_care_items,
            'all_opening_hour_items' => $all_opening_hour_items,
            'all_testimonial' => $all_testimonial,
            'all_counterups' => $all_counterups,
            'image_gallery_category' => $image_gallery_category,
            'all_gallery_images' => $all_gallery_images,
            'all_latest_blogs' => $all_latest_blogs,
            'all_services' => $all_services,
            'all_key_features' => $all_key_features,
            'all_products' => $all_products,
            'products_category' => $products_category,
            'all_popular_products' => $all_popular_products,
            'all_featured_products' => $all_featured_products,
            'all_best_seller_product' => $all_best_seller_product,
            'all_appointment' => $all_appointment,
        ]);
    }

    public function home_page_change($id)
    {
        if (!in_array($id, ['01', '02', '03', '04'])) {
            abort(404);
        }
        $home_page_variant = $id;

        $all_header_bottom_items = HeaderBottom::where('home_variant',$home_page_variant)->get();
        $all_medical_care_items = MedicalCareInfo::where('type','medical_care')->get();
        $all_opening_hour_items = MedicalCareInfo::where('type','opening_hour')->get();
        $all_testimonial = Testimonial::take(get_static_option('home_page_testimonial_section_home_'.$home_page_variant.'_display_items'))->get();
        $header_sliders = HeaderSlider::all();
        $all_counterups  = Counterup::take(3)->get();
        // image gallery start ---------
        $all_gallery_images = ImageGallery::take(get_static_option('site_image_gallery_post_items'))->get();
        $all_image_contain_cat = $all_gallery_images->map(function ($item){
            return $item->cat_id;
        });
        $image_gallery_category = ImageGalleryCategory::find($all_image_contain_cat);
        // image gallery end ----------
        $all_latest_blogs = Blog::where('status', 'publish')->orderBy('id', 'desc')->take(get_static_option('home_page_latest_blog_section_display_item'))->get();
        $all_services = Services::where('status', 'publish')->orderBy('id', 'desc')->take(get_static_option('home_page_what_we_do_section_display_item_home_'.$home_page_variant.''))->get();
        $all_key_features = Keyfeature::where('variant',(in_array($home_page_variant, ['01','02']))? 'one' : 'two')->orderBy('id', 'desc')->take(3)->get();
        // product by category start ---------
        $all_products = Products::where('status','publish')->take(get_static_option('home_page_product_category_section_display_item_home_'.$home_page_variant.''))->get();
        $all_products_contain_cat = $all_products->map(function ($item){
            return $item->category_id;
        });
        $products_category = ProductCategory::find($all_products_contain_cat);
        // product by category end ---------
        $all_popular_products = Products::where('status','publish')->orderBy('total_sold','desc')->take(get_static_option('home_page_popular_product_section_display_item_home_'.$home_page_variant.''))->get();
        $all_featured_products = Products::where(['status'=>'publish','is_featured'=>'on'])->take(get_static_option('home_page_featured_product_section_display_item_home_'.$home_page_variant.''))->get();
        $all_best_seller_product = Products::where(['status'=>'publish'])->take(get_static_option('home_page_best_seller_product_section_display_item_home_'.$home_page_variant.''))->get();
        $all_appointment = Appointment::where(['status'=>'publish','appointment_status'=>'yes'])->take(get_static_option('home_page_appointment_section_display_item'))->get();

        return view('frontend.frontend-home-demo')->with([
            'header_sliders' => $header_sliders,
            'all_header_bottom_items' => $all_header_bottom_items,
            'all_medical_care_items' => $all_medical_care_items,
            'all_opening_hour_items' => $all_opening_hour_items,
            'all_testimonial' => $all_testimonial,
            'all_counterups' => $all_counterups,
            'image_gallery_category' => $image_gallery_category,
            'all_gallery_images' => $all_gallery_images,
            'all_latest_blogs' => $all_latest_blogs,
            'all_services' => $all_services,
            'all_key_features' => $all_key_features,
            'all_products' => $all_products,
            'products_category' => $products_category,
            'all_popular_products' => $all_popular_products,
            'all_featured_products' => $all_featured_products,
            'all_best_seller_product' => $all_best_seller_product,
            'all_appointment' => $all_appointment,
            'home_page' => $id,
        ]);
    }

    public function ajax_login(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|string',
            'password' => 'required|min:6'
        ], [
            'username.required'   => __('Username required'),
            'password.required' => __('Password required'),
            'password.min' => __('Password length must be 6 characters')
        ]);
        if (Auth::guard('web')->attempt(['username' => $request->username, 'password' => $request->password], $request->get('remember'))) {
            return response()->json([
                'msg' => __('Login Success Redirecting'),
                'type' => 'danger',
                'status' => 'valid'
            ]);
        }
        return response()->json([
            'msg' => __('User name and password do not match'),
            'type' => 'danger',
            'status' => 'invalid'
        ]);
    }
    public function blog_page()
    {
        $all_blogs = Blog::where('status','publish')->orderBy('id','desc')->paginate(get_static_option('blog_page_item'));
        return view('frontend.pages.blog')->with([
            'all_blogs' => $all_blogs,
        ]);
    }
    public function category_wise_blog_page($id)
    {
        $all_blogs = Blog::where(['status'=>'publish','category_id'=>$id])->paginate(get_static_option('blog_page_item'));
        $all_recent_blogs = Blog::where('status','publish')->orderBy('id','DESC')->paginate(get_static_option('blog_page_recent_post_widget_item'));
        $category_name = BlogCategory::find($id)->name;
        return view('frontend.pages.blog-category')->with([
            'all_blogs' => $all_blogs,
            'all_recent_blogs' => $all_recent_blogs,
            'category_name' => $category_name,
        ]);
    }
    public function tags_wise_blog_page($tag)
    {
        $all_blogs = Blog::where('tags', 'LIKE', '%' . $tag . '%')
            ->orderBy('id', 'desc')->paginate(get_static_option('blog_page_item'));
        $all_recent_blogs = Blog::where('status','publish')->orderBy('id','DESC')->paginate(get_static_option('blog_page_recent_post_widget_item'));
        return view('frontend.pages.blog-tags')->with([
            'all_blogs' => $all_blogs,
            'tag_name' => $tag,
            'all_recent_blogs' => $all_recent_blogs,

        ]);
    }
    public function blog_search_page(Request $request)
    {
        $all_recent_blogs = Blog::where('status','publish')->orderBy('id','DESC')->paginate(get_static_option('blog_page_recent_post_widget_item'));
        $all_category = BlogCategory::where('status','publish')->orderBy('id','desc')->get();
        $all_blogs = Blog::where('title', 'LIKE', '%' . $request->search . '%')
            ->orWhere('content', 'LIKE', '%' . $request->search . '%')
            ->orWhere('tags', 'LIKE', '%' . $request->search . '%')
            ->orderBy('id', 'desc')->paginate(get_static_option('blog_page_item'));
        $all_counterups  = Counterup::take(3)->get();
        return view('frontend.pages.blog-search')->with([
            'all_blogs' => $all_blogs,
            'all_categories' => $all_category,
            'search_term' => $request->search,
            'all_recent_blogs' => $all_recent_blogs,
            'all_counterups' => $all_counterups
        ]);
    }
    public function blog_single_page($id,$slug){
        $blog_post = Blog::where('id',$id)->first();
        $all_recent_blogs = Blog::where('status','publish')->orderBy('id','DESC')->paginate(get_static_option('blog_page_recent_post_widget_item'));
        $all_category = BlogCategory::where('status','publish')->orderBy('id','desc')->get();
        $all_counterups  = Counterup::take(3)->get();
        return view('frontend.pages.blog-single')->with([
            'blog_post' => $blog_post,
            'all_categories' => $all_category,
            'all_recent_blogs' => $all_recent_blogs,
            'all_counterups' => $all_counterups
        ]);
    }
    public function showAdminForgetPasswordForm()
    {
        return view('auth.admin.forget-password');
    }
    public function sendAdminForgetPasswordMail(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|string:max:191'
        ]);
        $user_info = Admin::where('username', $request->username)->orWhere('email', $request->username)->first();
        $token_id = Str::random(30);
        $existing_token = DB::table('password_resets')->where('email', $user_info->email)->delete();
        if (empty($existing_token)) {
            DB::table('password_resets')->insert(['email' => $user_info->email, 'token' => $token_id]);
        }
        $message = __('Here is you password reset link, If you did not request to reset your password just ignore this mail.').' <a style="background-color:#d0f1ff;color:#fff;text-decoration:none;padding: 10px 15px;border-radius: 3px;display: block;width: 130px;margin-top: 20px;" href="' . route('admin.reset.password', ['user' => $user_info->username, 'token' => $token_id]) . '">'.__('Click Reset Password').'</a>';
        if (sendEmail($user_info->email, $user_info->username, __('Reset Your Password'), $message)) {
            return redirect()->back()->with([
                'msg' => __('Check Your Mail For Reset Password Link'),
                'type' => 'success'
            ]);
        }
        return redirect()->back()->with([
            'msg' => __('Something Wrong, Please Try Again!!'),
            'type' => 'danger'
        ]);
    }
    public function showAdminResetPasswordForm($username, $token)
    {
        return view('auth.admin.reset-password')->with([
            'username' => $username,
            'token' => $token
        ]);
    }
    public function AdminResetPassword(Request $request)
    {
        $this->validate($request, [
            'token' => 'required',
            'username' => 'required',
            'password' => 'required|string|min:8|confirmed'
        ]);
        $user_info = Admin::where('username', $request->username)->first();
        $user = Admin::findOrFail($user_info->id);
        $token_iinfo = DB::table('password_resets')->where(['email' => $user_info->email, 'token' => $request->token])->first();
        if (!empty($token_iinfo)) {
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->route('admin.login')->with(['msg' =>__( 'Password Changed Successfully'), 'type' => 'success']);
        }
        return redirect()->back()->with(['msg' => __('Somethings Going Wrong! Please Try Again or Check Your Old Password'), 'type' => 'danger']);
    }
    public function lang_change(Request $request)
    {
        session()->put('lang', $request->lang);
        return redirect()->route('homepage');
    }

    public function send_contact_message(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|max:191',
            'name' => 'required|string|max:191',
            'subject' => 'required|string|max:191',
            'message' => 'required'
        ]);
        $subject = 'From ' . get_static_option('site_title') . ' ' . $request->subject;
        if (sendPlanEmail(get_static_option('site_global_email'), $request->name, $subject, $request->message, $request->email)) {
            return redirect()->back()->with(['msg' => __('Thanks for your contact!!'), 'type' => 'success']);
        }
        return redirect()->back()->with(['msg' => __('Something goes wrong, Please try again later !!'), 'type' => 'danger']);
    }
    public function dynamic_single_page($slug)
    {
        $page_post = Page::where('slug', $slug)->first();

        return view('frontend.pages.dynamic-single')->with([
            'page_post' => $page_post
        ]);
    }
    public function showUserForgetPasswordForm()
    {
        return view('frontend.user.forget-password');
    }
    public function sendUserForgetPasswordMail(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|string:max:191'
        ]);
        $user_info = User::where('username', $request->username)->orWhere('email', $request->username)->first();
        if (!empty($user_info)) {
            $token_id = Str::random(30);
            $existing_token = DB::table('password_resets')->where('email', $user_info->email)->delete();
            if (empty($existing_token)) {
                DB::table('password_resets')->insert(['email' => $user_info->email, 'token' => $token_id]);
            }
            $message = __('Here is you password reset link, If you did not request to reset your password just ignore this mail.') . ' <a class="btn" href="' . route('user.reset.password', ['user' => $user_info->username, 'token' => $token_id]) . '">' . __('Click Reset Password') . '</a>';
            $data = [
                'username' => $user_info->username,
                'message' => $message
            ];
            try {
                Mail::to($user_info->email)->send(new AdminResetEmail($data));
            }catch (\Exception $e){
                //
            }

            return redirect()->back()->with([
                'msg' => __('Check Your Mail For Reset Password Link'),
                'type' => 'success'
            ]);
        }
        return redirect()->back()->with([
            'msg' => __('Your Username or Email Is Wrong!!!'),
            'type' => 'danger'
        ]);
    }
    public function showUserResetPasswordForm($username, $token)
    {
        return view('frontend.user.reset-password')->with([
            'username' => $username,
            'token' => $token
        ]);
    }
    public function UserResetPassword(Request $request)
    {
        $this->validate($request, [
            'token' => 'required',
            'username' => 'required',
            'password' => 'required|string|min:8|confirmed'
        ]);
        $user_info = User::where('username', $request->username)->first();
        $user = User::findOrFail($user_info->id);
        $token_iinfo = DB::table('password_resets')->where(['email' => $user_info->email, 'token' => $request->token])->first();
        if (!empty($token_iinfo)) {
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->route('user.login')->with(['msg' => __('Password Changed Successfully'), 'type' => 'success']);
        }
        return redirect()->back()->with(['msg' => __('Somethings Going Wrong! Please Try Again or Check Your Old Password'), 'type' => 'danger']);
    }
    public function flutterwave_pay_get()
    {
        return redirect_404_page();
    }

    public function generate_invoice(Request $request)
    {
        $order_details = ProductOrder::find($request->order_id);
        if (empty($order_details)) {
            return redirect_404_page();
        }
        $pdf = PDF::loadView('backend.products.pdf.order', ['order_details' => $order_details]);
        return $pdf->download('product-order-invoice.pdf');
    }

    public function about_page()
    {
        $all_gallery_images = ImageGallery::take(get_static_option('site_image_gallery_post_items'))->get();
        $all_image_contain_cat = [];
        foreach ($all_gallery_images as $work) {
            $all_image_contain_cat[] = $work->cat_id;
        }
        $image_gallery_category = ImageGalleryCategory::find($all_image_contain_cat);
        return view('frontend.pages.about-us')->with([
            
            
            'image_gallery_category' => $image_gallery_category,
            
            'all_gallery_images' => $all_gallery_images
        ]);
    }

    public function contact_page()
    {
        return view('frontend.pages.contact-page');
    }
    // service Page
    public function service_page()
    {
        $all_services = Services::where(['status' => 'publish'])->orderBy('sr_order', 'asc')->paginate(get_static_option('service_page_service_items'));
        return view('frontend.pages.service.services')->with(['all_services' => $all_services]);
    }
    public function services_single_page($slug,$id)
    {
        $service_item = Services::find($id);
        $service_category = ServiceCategory::where('status','publish')->get();
        return view('frontend.pages.service.service-single')->with(['service_item' => $service_item, 'service_category' => $service_category]);
    }

    public function category_wise_services_page($id, $any)
    {
        $category_name = ServiceCategory::find($id)->name;
        $service_category = ServiceCategory::where('status','publish')->get();
        $service_item = Services::where(['category_id' => $id])->paginate(6);
        return view('frontend.pages.service.service-category')->with(['service_item' => $service_item, 'category_name' => $category_name,'service_category'=>$service_category]);
    }
    public function user_logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
    //products
    public function products(Request $request)
    {
        $selected_rating = $request->rating ? $request->rating : '';
        $search_term = $request->q ? $request->q : '';
        $query = Products::query();
        if($search_term){
            $query->where('title', 'LIKE', '%' . $search_term . '%');
        }
        if ($selected_rating) {
            $product_ids = [];
            $all_products_id = ProductRatings::where('ratings', '>=', $selected_rating)->get('product_id');
            foreach ($all_products_id as $product_id) {
                $product_ids[] = $product_id->product_id;
            }
            $query->find(array_unique($product_ids));
        }
        $query->where(['status' => 'publish']);
        $maximum_available_price = max(Products::pluck('sale_price')->toArray());
        $all_category = ProductCategory::where(['parent_id'=>0,'status'=>'publish'])->get();
        $selected_category = $request->cat_id ? $request->cat_id : '';

        $selected_order = $request->orderby ? $request->orderby : 'default';

        if ($selected_category) {
            $query->where(['category_id' => $selected_category]);
        }

        $min_price = $request->min_price ? $request->min_price : 0;
        $max_price = $request->max_price ? $request->max_price : $maximum_available_price;
        if ($min_price > 0) {
            $query->where('sale_price', '>=', $min_price);
        }

        if ($max_price) {
            $query->where('sale_price', '<=', $max_price);
        }
        if ($selected_order == 'old') {
            $query->orderBy('id', 'ASC');
        } elseif ($selected_order == 'high_low') {
            $query->orderBy('sale_price', 'DESC');
        } elseif ($selected_order == 'low_high') {
            $query->orderBy('sale_price', 'ASC');
        } else {
            $query->orderBy('id', 'DESC');
        }
        $all_products = $query->paginate(get_static_option('product_post_items'));
        return view('frontend.pages.products.products')->with([
            'all_products' => $all_products,
            'all_category' => $all_category,
            'search_term' => $search_term,
            'selected_rating' => $selected_rating,
            'selected_order' => $selected_order,
            'min_price' => $min_price,
            'max_price' => $max_price,
            'selected_category' => $selected_category,
            'maximum_available_price' => $maximum_available_price
        ]);
    }

    public function product_single($slug,$id)
    {
        $product = Products::where('id', $id)->first();
        if (empty($product)) {
            return redirect_404_page();
        }
        $related_products = Products::where('category_id', $product->category_id)->get()->except($product->id)->take(4);
        $average_ratings = ProductRatings::Where('product_id', $product->id)->pluck('ratings')->avg();
        return view('frontend.pages.products.product-single')->with(
            [
                'product' => $product,
                'related_products' => $related_products,
                'average_ratings' => $average_ratings
            ]);
    }

    public function products_category($id, $any)
    {
        $all_products = Products::where(['status' => 'publish', 'category_id' => $id])->orderBy('id', 'desc')->paginate(get_static_option('product_post_items'));
        $category_name = ProductCategory::find($id)->name;
        return view('frontend.pages.products.product-category')->with([
            'all_products' => $all_products,
            'category_name' => $category_name,
        ]);
    }

    public function products_cart()
    {
        $all_cart_items = get_cart_items();
        $all_shipping = ProductShipping::where(['status' => 'publish'])->orderBy('order', 'ASC')->get();
        return view('frontend.pages.products.product-cart')->with([
            'all_cart_items' => $all_cart_items,
            'all_shipping' => $all_shipping,
        ]);
    }

    public function product_checkout()
    {
        return view('frontend.pages.products.product-checkout');
    }

    public function product_payment_success($id)
    {
        $extract_id = substr($id,6);
        $extract_id =  substr($extract_id,0,-6);
        $order_details = ProductOrder::find($extract_id);
        if (empty($order_details)) {
            return redirect_404_page();
        }
        return view('frontend.pages.products.product-success')->with(['order_details' => $order_details]);
    }

    public function product_payment_cancel($id)
    {
        $order_details = ProductOrder::find($id);
        if (empty($order_details)) {
            return redirect_404_page();
        }
        return view('frontend.pages.products.product-cancel')->with(['order_details' => $order_details]);
    }

    public function product_ratings(Request $request)
    {
        $this->validate($request, [
            'product_id' => 'required',
            'ratings' => 'required',
            'ratings_message' => 'nullable|string'
        ]);

        $existing_rating = ProductRatings::where(['product_id' => $request->product_id, 'user_id' => auth()->user()->id])->first();
        if (!empty($existing_rating)) {
            return redirect()->back()->with(['msg' => __('You have already rated this product'), 'type' => 'danger']);
        }
        ProductRatings::create([
            'ratings' => $request->ratings,
            'message' => $request->ratings_message,
            'product_id' => $request->product_id,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->back()->with(['msg' => __('Thanks for your rating'), 'type' => 'success']);
    }
    public function quote_page(){

        return view('frontend.pages.quote-page');
    }
    public function product_quickview(Request $request){
        $product = Products::where('id', $request->product_id)->first();
        $average_ratings = ProductRatings::Where('product_id', $request->product_id)->pluck('ratings')->avg();
        return response()->json([
            'view'=>(String)View::make('frontend.pages.products.quickview-component')->with([
                'product'=> $product,
                'average_ratings'=>$average_ratings,
            ])
        ]);
    }
    public function wishlist(){
        $all_wishlist_items = get_wishlist_items();
        return view('frontend.pages.products.product-wishlist')->with([
            'all_wishlist_items' => $all_wishlist_items
        ]);
    }
    public function faq_page()
    {
        $all_faqs = Faq::take(get_static_option('faq_page_section_item'))->get();
        return view('frontend.pages.faq-page')->with([
            'all_faqs' => $all_faqs
        ]);
    }
    public function image_gallery()
    {
        $all_gallery_images = ImageGallery::take(get_static_option('site_image_gallery_post_items'))->get();
        $all_cat = $all_gallery_images->map(function ($item){
           return  $item->cat_id;
        });
        $image_gallery_category = ImageGalleryCategory::find($all_cat);
        return view('frontend.pages.image-gallery')->with([
            'image_gallery_category' => $image_gallery_category,
            'all_gallery_images' => $all_gallery_images
        ]);
    }

    public function testimonial(){
        $all_testimonial = Testimonial::orderBy('id','desc')->paginate(12);
        return view('frontend.pages.testimonial')->with([
            'all_testimonial' => $all_testimonial,
        ]);
    }

    public function prescription_upload(){
        return view('frontend.pages.prescription-upload');
    }

    public function store_prescription_upload(Request $request){

        $this->validate($request,[
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'name' => 'required|string',
            'customer_message' => 'nullable|string',
            'customer_prescription' => 'required|file|mimes:pdf,jpg,jpeg,png|max:10000',
        ],[
            'email.required' => __('enter your email'),
            'name.required' => __('enter your name'),
            'customer_prescription.required' => __('upload your prescription'),
        ]);
        $prescription = new Prescription();
        if($request->file('customer_prescription')){
            $extention = strtolower($request->file('customer_prescription')->getClientOriginalExtension());
            $image_full_name = 'user_prescription_'.date('dmy_H_s_i').'.'.$extention;
            $upload_path = 'assets/uploads/prescription/';
            $image_url = $upload_path . $image_full_name;
            $request->file('customer_prescription')->move($upload_path, $image_full_name);
            $prescription->customer_prescription = $image_url;
        }
        $prescription->user_id = $request->user_id ?? null;
        $prescription->customer_message = Purifier::clean($request->customer_message);
        $prescription->name = $request->name;
        $prescription->email = $request->email;
        $prescription->status = 'pending';
        $prescription->save();

        //send to customer
        $data['subject'] = __('Prescription Request');
        $data['message'] = __('Hello,').$request->name.'<br>';

        $data['message'] .= __('Your prescription request has been submitted successfully.We will get back to you soon!');

         try{
             Mail::to($request->email)->send(new BasicMail($data));
         }catch (\Exception $e){

         }
        //send to admin
        $data['subject'] = __('You have a Prescription Request');
        $data['message'] = __('Hello,').'<br>';
        $data['message'] .= __('You have a prescription request from :'.$request->name.' ('.$request->email.')');
        try {
            Mail::to(get_static_option('appointment_notify_mail'))->send(new BasicMail($data));
        }catch (\Exception $e){

        }

        return redirect()->back()->with(['msg' => get_static_option('prescription_form_submission_msg'), 'type' => 'success']);

    }
}
