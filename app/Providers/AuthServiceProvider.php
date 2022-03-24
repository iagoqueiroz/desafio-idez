<?php

namespace App\Providers;

use App\Models\PixTransfer;
use App\Policies\PixTransferPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        PixTransfer::class => PixTransferPolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
