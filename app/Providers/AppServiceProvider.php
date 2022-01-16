<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use View;

use App\product;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('frontend.home.homecontent',function($view){

             $latestproducts=product::where('publicationstatus',1)
                      ->where('featurename',0)
                      ->get();
             $view->with('latestproducts',$latestproducts);

             $specialproducts=product::where('publicationstatus',1)
                      ->where('featurename',1)
                      ->get();
             $view->with('specialproducts',$specialproducts);


              $collectionproducts=product::where('publicationstatus',1)
                      ->where('featurename',2)
                      ->get();
             $view->with('collectionproducts',$collectionproducts);

        });
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
