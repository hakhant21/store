<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Order;
use Nicolaslopezj\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use SearchableTrait;

    protected $guarded = [];

    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'products.name' => 5,
            'products.details' => 3,
            'products.price' => 2,
        ]
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
