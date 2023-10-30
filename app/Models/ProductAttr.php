<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttr extends Model
{
    protected $primary_key = 'id';
    protected $table = 'product_attr';
    use HasFactory;    
}
