<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Traits\Relationship;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model implements TranslatableContract
{
    use HasFactory, Translatable, Relationship;

    public $translatedAttributes = ['title', 'description', 'short_description'];
    protected $fillable = ['price', 'in_stock', 'SKU', 'discount', 'thumbnail'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function endPrice() : Attribute
    {
        return new Attribute(
            get: function() {
                $price = is_null($this->attributes['discount'])
                    ? $this->attributes['price']
                    : ($this->attributes['price'] - ($this->attributes['price'] * ($this->attributes['discount'] / 100)));

                return $price < 0 ? 0 : round($price, 2);
            }
        );
    }

    public function available() : Attribute
    {
        return new Attribute(
            get: function (){
                $available = $this->attributes['in_stock'] > 0 ? 'Available' : 'Not available';
                return $available;
            }
        );
    }
}
