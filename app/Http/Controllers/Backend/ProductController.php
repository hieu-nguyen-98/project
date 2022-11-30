<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Carbon\Carbon;
use File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('backend.products.index')->with([
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('parent_id', null)->get();
        return view('backend.products.create')->with(compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product;

        $image = array();
        if ($files = $request->file('image')) {
            foreach($files as $file){
                $image_name = md5(rand(1000,10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $image_full_name = $image_name.'.'.$ext;
                $upload_file = 'assets/uploads/products/';
                $image_url = $upload_file.$image_full_name;
                $file->move($upload_file, $image_full_name);
                $image[] = $image_url;
            }
        }
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->image = implode('|', $image);
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;
        $product->created_at = Carbon::now();
        $product->updated_at = Carbon::now();
        $product->save();

        if (! $product) {
            toast('Something went wrong!', 'error');
            
        }
        toast('Product created successfully', 'success');
        return redirect(route('product.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        if (! $product) {
            abort(404);
        }
        return view('backend.products.show')->with(compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::with('childrenCategory')->where('parent_id', Null)->get();
        $product = Product::find($id);
        if(! $product){
            abort(404);
        }
        return view('backend.products.edit')->with(compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $image = array();
        if($request->hasFile('image'))
        {
            $path = 'assets/uploads/products'.$product->image;
            if ($files = $request->file('image')) {
                foreach($files as $file){
                    $image_name = md5(rand(1000,10000));
                    $ext = strtolower($file->getClientOriginalExtension());
                    $image_full_name = $image_name.'.'.$ext;
                    $upload_file = 'assets/uploads/products/';
                    $image_url = $upload_file.$image_full_name;
                    $file->move($upload_file, $image_full_name);
                    $image[] = $image_url;
                }
                $product->image = implode('|', $image);
            }
        }
        
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;
        $product->created_at = Carbon::now();
        $product->updated_at = Carbon::now();
        $product->save();
        if (! $product) {
            toast('Something went wrong!', 'error');
            
        }
        toast('Product created successfully', 'success');
        return redirect(route('product.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if (! $product) {
            toast('Something went wrong!','error');
        }
        $product->delete();
        toast('Product Delete successfully','success');
        return back();
    }

    public function attribute($id){
        $attr = Product::find($id);
        if ($attr) {
            return view('backend.products.attribute')->with(compact('attr'));
        }
        abort(404);
    }
}
