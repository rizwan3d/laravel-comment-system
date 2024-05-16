<?php

declare(strict_types=1);

namespace Rizwan3d\CommentSystem\Providers;

use Illuminate\Support\ServiceProvider;

final class PackageServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');
    }
}
