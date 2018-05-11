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
          $website = website::all()->last();
          view()->share('categories', $categories);
          view()->share('subcategories', $subcategories);
          view()->share('products', $products);
          view()->share('brands', $brands);
          view()->share('website', $website);

          
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
