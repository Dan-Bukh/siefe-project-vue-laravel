<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['first_name', 'last_name', 'items', 'number', 'email'];
    protected $table = 'orders';
    use HasFactory;
}
