<?php

declare(strict_types=1);

namespace Grocelivery\IdentityProvider\Providers;

use Grocelivery\IdentityProvider\Http\Clients\OAuthClient;
use Grocelivery\IdentityProvider\Http\Responses\Response;
use Grocelivery\IdentityProvider\Interfaces\Http\Clients\OAuthClientInterface;
use Illuminate\Support\Facades\Schema;
use Grocelivery\IdentityProvider\Interfaces\Http\Responses\ResponseInterface;
use Illuminate\Support\ServiceProvider;

/**
 * Class AppServiceProvider
 * @package Grocelivery\IdentityProvider\Providers
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function register(): void
    {
    }

    /**
     * @return void
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
        $this->app->bind(ResponseInterface::class, Response::class);
        $this->app->bind(OAuthClientInterface::class, OAuthClient::class);
    }
}