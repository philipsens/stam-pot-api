<?php

namespace App\Observers;

use App\Models\Income;

class IncomeObserver
{
    public function saved(Income $income)
    {
        $income->customer->balance += $income->amount;
        $income->customer->save();
    }
}
