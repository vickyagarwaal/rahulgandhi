<?php

namespace App\Providers;

use App\Infobar;
use App\Language;
use App\SocialIcon;
use App\TopbarInfo;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        $all_language = Language::all();
        $all_topbar_infos = TopbarInfo::all();
        $all_topbar_icons = SocialIcon::all();
        $all_infobar_items = Infobar::all();
        Paginator::useBootstrap();
        view::share([
            'all_language' => $all_language,
            'all_topbar_infos' => $all_topbar_infos,
            'all_topbar_icons' => $all_topbar_icons,
            'all_infobar_items' => $all_infobar_items
        ]);
    }
}
