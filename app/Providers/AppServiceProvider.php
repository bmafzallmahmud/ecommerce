<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use View;
use App\Category;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

         View::share('name','afzall');
         View::composer('fontEnd.include.menu',function($view){
            $publishedCategory = Category::where('publicationStatus',1)->get();
            $view->with('publishedCategory',$publishedCategory);
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
