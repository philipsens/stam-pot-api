<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    protected $fillable = ['name', 'email', 'balance', 'birthday'];
    protected $dates = ['birthdate'];
    protected $hidden = ['email', 'birthday', 'created_at', 'updated_at', 'deleted_at'];

    public function incomes()
    {
        return $this->hasMany('App\Models\Income');
    }

    public function getTransactionInfoAttribute()
    {
        return [
            'total' => $this->transactions()->count(),
            'today' => $this->transactions()->where('date', '>', Carbon::yesterday())->count(),
            'spend' => round($this->transactions()->sum('amount'), 2)
        ];
    }

    public function transactions()
    {
        return $this->hasMany('App\Models\Transaction');
    }
}
