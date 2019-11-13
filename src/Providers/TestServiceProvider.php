<?php

namespace Yang\LLaravel\Providers;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class TestServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerRoutes();
        $this->loadViewsFrom(
            __DIR__.'/../../resources/views', 'yang'
        );
    }
    //这是仿照laravel/telescope组件的路由
    private function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__.'/../Http/routes.php');
        });
    }
    /**
     * Get the Telescope route group configuration array.
     *
     * @return array
     */
    private function routeConfiguration()
    {
        return [
            //这是访问的域名设置
            //'domain' => config('telescope.domain', null),
            //命名空间设置
            'namespace' => 'Yang\LLaravel\Http\Controllers',
            //这是前缀
            'prefix' => 'yang',
            //中间件名称
            'middleware' => 'web',
        ];
    }
}
