<?php

namespace App\Providers;

use App\Models\Income;
use App\Models\Transaction;
use App\Observers\IncomeObserver;
use App\Observers\TransactionObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Transaction::observe(TransactionObserver::class);
        Income::observe(IncomeObserver::class);
    }
}
