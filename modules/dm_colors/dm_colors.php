<?php

namespace Modules\dm_colors;

use Illuminate\Support\ServiceProvider;

class dm_colors extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        $this->loadRoutesFrom(__DIR__ . '/routes/api.php');
    }
}
