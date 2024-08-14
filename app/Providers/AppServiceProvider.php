<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Feature\Cart;
use Illuminate\Http\Request;
use App\Models\Master\Category;
use App\Models\Setting\WebConfig;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Schema;
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
        view()->composer('*', function ($view) {
            if (Auth::check()) {
                $totalCart = Cart::where(['user_id' => Auth::user()->id])->count();
                $view->with('totalCart', $totalCart);
            }
        });
        if (Schema::hasTable('web_configs')) {
            view()->share([
                'app_name' => WebConfig::where(['name' => 'app_name'])->first()['value'] ?? '-',
                'app_logo' => WebConfig::where(['name' => 'app_logo'])->first()['file_path'] ?? '-',
            ]);
        }

        Gate::define('admin', function (User $user) {
            return $user->id == 1;
        });
    }
}
