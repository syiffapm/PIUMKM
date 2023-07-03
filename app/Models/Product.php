<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\SoftDeletes as EloquentSoftDeletes;


class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name','store_name', 'users_id', 'categories_id', 'price', 'description','slug', 
    ];

    protected $hidden = [

    ];

    public function galleries(){
        return $this->hasMany( ProductGallery::class, 'products_id', 'id' );
    }

   public function user()
{
    return $this->belongsTo(User::class, 'users_id');
}


    public function category(){
        return $this->belongsTo( Category::class, 'categories_id', 'id');
    }
    
}