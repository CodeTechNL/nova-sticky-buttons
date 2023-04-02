<?php

    namespace Codetech\NovaStickyButtons;

    use Illuminate\Support\ServiceProvider;
    use Laravel\Nova\Events\ServingNova;
    use Laravel\Nova\Nova;

    class AssetServiceProvider extends ServiceProvider
    {
        /**
         * Bootstrap any application services.
         *
         * @return void
         */
        public function boot()
        {
            $this->mergeConfigFrom(__DIR__ . '/../config/codetech_nova_sticky_buttons.php',
                'codetech_nova_sticky_buttons');

            Nova::serving(function (ServingNova $event) {
                Nova::script('nova-sticky-buttons', __DIR__ . '/../dist/js/asset.js');
                Nova::style('nova-sticky-buttons', __DIR__ . '/../dist/css/asset.css');

                Nova::provideToScript([
                    'codetech_scroll_stick_at' => config('codetech_nova_sticky_buttons.scroll_stick_at'),
                    'codetech_scroll_stick_permanent' => config('codetech_nova_sticky_buttons.stick_permanent'),
                ]);
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
