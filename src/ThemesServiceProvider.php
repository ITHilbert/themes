<?php

namespace ITHilbert\Themes;

use Illuminate\Support\ServiceProvider;
//use Illuminate\View\Compilers\BladeCompiler;
use ITHilbert\Themes\Commands\CreateCommand;

class ThemesServiceProvider extends ServiceProvider
{

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {

        $this->registerViews();
        $this->registerConfig();
        $this->registerTranslations();
        $this->registerRoutes();
        $this->registerCommands();
        $this->loadMigrationsFrom(__DIR__ . '/Database/Migrations');
    }

     /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
       /*  $this->app->register(RouteServiceProvider::class); */
       /* $this->registerBladeExtensions(); */
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $this->loadViewsFrom(__DIR__ .'/Resources/views', 'themes');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $this->loadTranslationsFrom(__DIR__ .'/Resources/lang', 'themes');
    }



    /**
     * Register commands.
     *
     * @return void
     */
    protected function registerCommands()
    {
        $this->commands( CreateCommand::class );

    }

    /**
     * Middlewares
     *
     * @return void
     */
    public function registerMiddleware(){
        /* $this->app['router']->aliasMiddleware('MiddlewareName' , \ITHilbert\Themes\Middleware\MiddlewareName::class); */
    }


    /**
     * Assets kopieren
     *
     * @return void
     */
    public function publishAssets()
    {
        $this->publishes([
            __DIR__ .'/Resources/assets' => public_path('vendor/themes'),
        ]);
    }


    /**
     * Register Routes.
     *
     * @return void
     */
    protected function registerRoutes()
    {
        $this->loadRoutesFrom(__DIR__ . '/Routes/web.php');
    }




    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            __DIR__ .'/Config/config.php' => config_path('themes/config.php')
        ]);
    }


    /**
     * Eigende Blade function (Directive)
     *
     * @return void
     */
    protected function registerBladeExtensions()
    {
        /* $this->app->afterResolving('blade.compiler', function (BladeCompiler $bladeCompiler) {

            $bladeCompiler->directive('hasRole', function ($arguments) {
                list($role, $guard) = explode(',', $arguments.',');

                return "<?php if(auth({$guard})->check() && auth({$guard})->user()->hasRole({$role})): ?>";
            });
            $bladeCompiler->directive('endhasRole', function () {
                return '<?php endif; ?>';
            });

        }); */
    }
}
