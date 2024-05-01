<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{   
    protected $fillable = ['category', "title", 'price', 'count', 'content', 'image'];
    protected $table = 'catalog';
    use HasFactory;
}
