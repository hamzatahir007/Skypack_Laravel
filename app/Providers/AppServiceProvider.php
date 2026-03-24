<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        // // Force HTTPS
        // URL::forceScheme('https');

        // // Auto-sync new uploads to public/storage on every request
        // // This fixes the symlink issue on shared hosting
        // if (app()->environment('production')) {
        //     $source = storage_path('app/public');
        //     $dest   = public_path('storage');

        //     if (is_dir($source)) {
        //         $this->syncFolders($source, $dest);
        //     }
        // }
        Paginator::useBootstrapFive();

        Relation::enforceMorphMap([
            'traveler' => \App\Models\Traveler::class,
            'client'   => \App\Models\Client::class,
        ]);
    }
}
