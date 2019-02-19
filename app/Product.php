<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
class Product extends Model
{
	const IS_PUBLIC = 1;
    public $table = 'products';
    public $fillable = ['title','description','image','user_id','user_name','price'];

  	 public function setPublic(){
        $this->is_published = Product::IS_PUBLIC;
        $this->save();
    }
}
