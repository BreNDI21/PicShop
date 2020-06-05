<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Products extends Model
{
    protected $fillable = [
        'name', 'comment','price', 'image', 'feedback'
    ];
    public function categories(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'product_category', 'product_id','category_id');
    }
}
