<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\CountryRepositoryInterface;
use App\Repositories\CountryRepository;
use App\Interfaces\CityRepositoryInterface;
use App\Repositories\CityRepository;
use App\Interfaces\HotelRepositoryInterface;
use App\Repositories\HotelRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CountryRepositoryInterface::class, CountryRepository::class);
        $this->app->bind(CityRepositoryInterface::class, CityRepository::class);
        $this->app->bind(HotelRepositoryInterface::class, HotelRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
