<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use App\Product;
use Illuminate\Support\Facades\View;
use Auth;
class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $products = Product::where('user_id',Auth::user()->id)->get()->where('is_published',0);
        return view('home', compact('products'));

    }

    public function store(Request $request){
   
        $this->validate($request,[
            'title'=>'required',
            'description'=>'required',
            'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price'=>'required'
        ]);
        $uploads = $request->file('image');
        $path = $uploads->store('uploads', 'public');
        Product::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'user_id'=>$request->user_id,
            'user_name'=>$request->user_name,
            'price'=>$request->price,
            'image'=>$path

        ]);
        // $path = $request->file('image')->store('uploads', 'public');
        // $product = new Product;
        // $product->title = $request->title;
        // $product->description = $request->description;
        // $product->user_id = $request->user_id;
        // $product->user_name = $request->user_name;
        // $product->price = $request->price;
        // $product->image = $path;
        // $product->save();
        return redirect('/home');

    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
   
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
    
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
    $delete = Product::find($id);
    Storage::delete('public/'. $delete->image);
    $delete->delete();
    return redirect('/home');

    }
}
