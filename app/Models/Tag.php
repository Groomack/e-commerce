<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'tags';
    protected $guarded = false;

    public function products()
    {
        return $this->belongstoMany(Product::class);
    }
}
