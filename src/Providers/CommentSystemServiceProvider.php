<?php

namespace Rizwan3d\CommentSystem\Providers;

use Illuminate\Support\ServiceProvider;

final class CommentSystemServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');
    }
}
