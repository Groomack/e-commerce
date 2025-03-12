<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Filters\QueryFilter;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Color;

class Product extends Model
{
    use HasFactory;   

    protected $table = 'products';
    protected $guarded = false;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function tags()
    {
        return $this->belongstoMany(Tag::class);
    }
    public function colors()
    {
        return $this->belongstoMany(Color::class);
    }
    public function getImageUrlAttribute()
    {
        return url('storage/' . $this->previewImage);
    }

    //Filter
    public function scopeFilter(Builder $builder, QueryFilter $filter)
    {
        return $filter->apply($builder);
    }
}
