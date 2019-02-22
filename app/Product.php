<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Auth;
class Product extends Model
{
	const IS_PUBLIC = 1;
    public $table = 'products';
    public $fillable = ['title','description','image','user_id','user_name','price'];

  	 public function setPublic(){
        $this->is_published = Product::IS_PUBLIC;
        $this->save();
    }

    public static function is_published(){
    	$products = Product::where('is_published',1)->get();
    	return $products;
    }

    public static function publishedUserId(){
    	 $products = Product::where('user_id',Auth::user()->id)->get()->where('is_published',1);
    	 return $products;
    }
    public static function deleteAll($id){
    	$delete = Product::find($id);
    	Storage::delete('public/'. $delete->image);
    	$delete->delete();
    }
}
