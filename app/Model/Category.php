<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Category extends Model
{
    public function products():BelongsToMany
    {
        return $this->belongsTo(Products::class,'product_category','category_id','product_id');
    }
}
