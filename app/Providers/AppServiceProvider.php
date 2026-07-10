<?php

namespace App\Providers;

use App\Models\Profile;
use App\Models\SocialMedia;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        View::composer(
            ['components.navbar', 'components.footer'],
            function ($view) {
                $profile = Schema::hasTable('profiles')
                    ? Profile::first()
                    : null;

                $socialMedia = Schema::hasTable('social_media')
                    ? SocialMedia::orderBy('display_order')->get()
                    : collect();

                $view->with([
                    'profile' => $profile,
                    'socialMedia' => $socialMedia,
                ]);
            }
        );

        Carbon::setLocale('id');
    }
}
