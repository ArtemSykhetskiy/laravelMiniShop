<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Laravel\Sanctum\HasApiTokens;

class Category extends Model implements TranslatableContract
{
    use HasFactory, Translatable, HasApiTokens;

//    protected $fillable = ['name', 'description'];
    public $translatedAttributes = ['name', 'description'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
