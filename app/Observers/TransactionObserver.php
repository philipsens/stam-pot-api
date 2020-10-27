<?php

namespace App\Observers;

use App\Models\Transaction;

class TransactionObserver
{
    public function saved(Transaction $transaction)
    {
        $transaction->customer->balance -= $transaction->amount;
        $transaction->customer->save();
    }
}
