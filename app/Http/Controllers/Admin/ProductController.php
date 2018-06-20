<?php

namespace App\Http\Controllers\Admin;

use App\Model\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'size' => 'required',
            'image-data' => 'required',
        ]);

        $imageData = $request->get('image-data');
        $info = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imageData));
        $imageName = 'public/'.str_random(16).'.jpg';
        Storage::put($imageName,$info);

        $product = new Product();

        $product->name = $request->name;
        $product->image = $imageName;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->size = $request->size;
        $product->nutrition_label = $request->nutrition_label;
        $product->inventory_status = $request->inventory_status;

        $product->save();

        return redirect()->route('products.index')->with('message_alert','Successfully created product!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::where('id',$id)->first();

        return view('admin.products.edit',compact('product'));
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
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'size' => 'required'
        ]);

        $product = Product::where('id',$id)->first();

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->size = $request->size;
        $product->nutrition_label = $request->nutrition_label;

        if ($request->get('image-data')) {

            Storage::delete($product->image);

            $imageData = $request->get('image-data');
            $info = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imageData));
            $imageName = 'public/'.str_random(16).'.jpg';
            Storage::put($imageName,$info);

            $product->image = $imageName;
        }

        $product->save();

        return redirect()->route('products.index')->with('message_alert','Successfully updated product!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::where('id',$id)->first();
        Storage::delete($product->image);
        $product->delete();

        return redirect()->route('products.index')->with('message_alert','Successfully deleted product!');
    }

    public function change(Request $request)
    {
        $product = Product::where('id',$request->id)->first();

        $product->inventory_status = $request->status;

        $product->save();
    }
}
