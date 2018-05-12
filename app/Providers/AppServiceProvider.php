<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Category;
use App\Subcategory;
use App\Product;
use App\Shoppingcart;
use App\Order;
use App\Website;
use App\Brand;
use App\Review;
use App\Offer;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
          Schema::defaultStringLength(191);
          $categories = Category::all();
          $subcategories = Subcategory::all();
          $products = Product::all();
          $brands = Brand::all();
          $website = Website::all()->last();
          $reviews = Review::all();
          $offers = Offer::all();
          view()->share('categories', $categories);
          view()->share('subcategories', $subcategories);
          view()->share('products', $products);
          view()->share('brands', $brands);
          view()->share('website', $website);
          view()->share('reviews', $reviews);
          view()->share('offers', $offers);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
