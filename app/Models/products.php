<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;

    protected $table = 'fs_products';

    protected $fillable = [
        'name' , 
        'description' , 
        'id_brand' , 
        'id_category' , 
        'price'
    ];
}
