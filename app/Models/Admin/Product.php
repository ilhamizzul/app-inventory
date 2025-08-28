<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];
    protected $fillable = ['name', 'description', 'stock_keeping_unit', 'price', 'quantity_in_stock', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->stock_keeping_unit = 'SKU-' . strtoupper(uniqid());
        });
    }
}
