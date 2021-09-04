<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        Paginator::useBootstrap();
        $this->activeLinks();
    }

    public function activeLinks()
    {
        View::composer('layouts.app', function($view) {
            $view->with('homeActive', request()->is('/') ? 'menu-link__active' : '');
            $view->with('allPostsActive', request()->is('posts') || request()->is('posts/*') ? 'menu-link__active' : '');
            $view->with('addPostActive', request()->is('post/add') ? 'menu-link__active' : '');
        });
    }
}
