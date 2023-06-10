<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menuModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name' , 
        'is_published',
        'slug',
        'link',
        'icon_class',
        'order',
        'parent_id'
    ];
    protected $table = 'fs_menu';
}
