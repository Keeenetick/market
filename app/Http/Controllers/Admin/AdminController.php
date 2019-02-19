<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
class AdminController extends Controller
{

    public function index()
    {
    	$allproducts = Product::all();
    	return view('admin.dashboard', compact('allproducts'));
    }
    public function destroy($id)
    {
    	$delete = Product::find($id);
    	Storage::delete('public/'. $delete->image);
    	$delete->delete();
    	return redirect('/dashboard');
    }
    public function published($id)
    {
    	$published = Product::find($id);
    	$published->setPublic();
    	return redirect('/dashboard');
    }
}
