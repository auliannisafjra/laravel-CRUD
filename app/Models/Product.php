<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $guarded = ['id', 'user_id'];
    protected $table = 'products';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function toko()
    {
        return $this->hasOne(Toko::class, 'product_id');
    }
}
