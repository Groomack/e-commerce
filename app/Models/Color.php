<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Color extends Model
{
    use HasFactory;

    protected $table = 'colors';
    protected $guarded = false;

    public function products()
    {
        return $this->belongstoMany(Product::class);
    }
}
