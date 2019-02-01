<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
class Product extends Model
{
    public $table = 'products';
    public $fillable = ['title','description','image','user_id','user_name','price'];

  	
}
