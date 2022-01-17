<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class ProductController extends Controller
{
    public function index()
    {
        //

        $product_active = Product::where('status','Visibile')->get();
        $product_blocked = Product::where('status','Hidden')->get();


        return view('cms.product.index',['product_active'=>$product_active,'product_blocked'=>$product_blocked]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category = Category::all();
        return view('cms.product.create',['categories'=>$category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'name' => 'required|string|min:3',
            'details' => 'required|string|min:3',
            'product_image'=>'required',
            'count' => 'required|integer|min:1|gt:0',
            'price' => 'required|integer|min:0|gte:0',
            'sell_price' => 'required|integer|min:0|gte:0',
            'gender' => 'required|string|in:Male,Female',
            'size' => 'required|string|in:Small,Medium,Large,xl,xxl,xxxl',
            'type' => 'required|string|in:Kid,Teenger,Old',
            'season' => 'required|string|in:Summer,Fall,Winter,Spring',


                'status' => 'string|in:on,off'
        ]);

        $productImage = $request->file('product_image');

        $timeNow = Carbon::now();

        $time = $timeNow->minute . '_' . $timeNow->second;
        $name = $time . '_' . $request->get('name') . '_' . $productImage->getClientOriginalName();

        $productImage->move('images/products/', $name);
        $product = new Product();
        $product->category_id = $request->get('category_id');

        $product->name = $request->get('name');
        $product->details = $request->get('details');
        $product->product_image = $name;
        $product->count = $request->get('count');
        $product->price = $request->get('price');
        $product->sell_price = $request->get('sell_price');
        $product->gender = $request->get('gender');
        $product->size = $request->get('size');
        $product->type = $request->get('type');
        $product->season = $request->get('season');
        $product->status = $request->get('status') == 'on' ? "Visibile" : "Hidden";

        $isSaved = $product->save();

        if ($isSaved) {
            return redirect()->route('cms.product.index');
            session()->flash('status', 'alert-success');
            session()->flash('message', ' updated successfully');
        } else {
            session()->flash('status', 'alert-danger');
            session()->flash('message', ' update failed!');
        }
     //return view('cms.blocked');
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
        //
        $product = Product::find($id);
        return view('cms.product.edit',['product'=>$product]);
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
        //
        $request->request->add(['id'=>$id]);
        $request->validate([
            'id'=>'required|exists:products,id',
            'name' => 'required|string|min:3',
            'details' => 'required|string|min:3',

            'count' => 'required|integer|min:1|gt:0',
            'price' => 'required|integer|min:0|gte:0',
            'sell_price' => 'required|integer|min:0|gte:0',
            'gender' => 'required|string|in:Male,Female',
            'size' => 'required|string|in:Small,Medium,Large,xl,xxl,xxxl',
            'type' => 'required|string|in:Kid,Teenger,Old',
            'season' => 'required|string|in:Summer,Fall,Winter,Spring',


                'status' => 'string|in:on,off'
        ]);
        $product = Product::find($id);
        if($request->hasFile('product_image')){
            $productImage = $request->file('product_image');

            $timeNow = Carbon::now();

            $time = $timeNow->minute . '_' . $timeNow->second;
            $name = $time . '_' . $request->get('name') . '_' . $productImage->getClientOriginalName();
            $product->product_image = $name;

            $productImage->move('images/products/', $name);


        }


        $product->name = $request->get('name');
        $product->details = $request->get('details');

        $product->count = $request->get('count');
        $product->price = $request->get('price');
        $product->sell_price = $request->get('sell_price');
        $product->gender = $request->get('gender');
        $product->size = $request->get('size');
        $product->type = $request->get('type');
        $product->season = $request->get('season');
        $product->status = $request->get('status') == 'on' ? "Visibile" : "Hidden";
        $isSaved = $product->save();

        if ($isSaved) {
            return redirect()->route('cms.product.index');
            session()->flash('status', 'alert-success');
            session()->flash('message', ' updated successfully');
        } else {
            session()->flash('status', 'alert-danger');
            session()->flash('message', 'Author update failed!');
        }

     //return view('cms.blocked');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $isDeleted = Product::destroy($id);
        if($isDeleted){
            return redirect()->back();

        }else{

        }

    }
}
