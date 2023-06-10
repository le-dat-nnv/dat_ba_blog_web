<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content' ,
        'author',
        'category_id' , 
        'tags' , 
        'description' , 
        'source_url' , 
        'is_featured' , 
        'is_published'
    ];
     protected $table="fs_news";
}
