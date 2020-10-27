<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    protected $fillable = ['name', 'description', 'price'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public function transactions()
    {
        return $this->hasMany('App\Models\Transaction');
    }
}
