<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class WebSiteController extends Controller
{
    //
    public function showItem(){
        $slider = Product::where('status','Visibile')
            ->orderBy('created_at','desc')
            ->limit(3)
            ->get();
            $item=Product::where('status','Visibile')
            ->orderBy('created_at','desc')
            ->limit(6)
            ->get();
            $summer_item=Product::where('season','Summer')
            ->where('status','Visibile')
            ->orderBy('created_at','desc')
            ->limit(6)
            ->get();
            $winter_item=Product::where('season','Winter')
            ->where('status','Visibile')
            ->orderBy('created_at','desc')
            ->limit(6)
            ->get();
            $fall_item=Product::where('season','Fall')
            ->where('status','Visibile')
            ->orderBy('created_at','desc')
            ->limit(6)
            ->get();
            $spring_item=Product::where('season','Spring')
            ->where('status','Visibile')
            ->orderBy('created_at','desc')
            ->limit(6)
            ->get();



            return view('website.index',
            ['slider'=>$slider,
            'item'=>$item,
            'summer_item'=>$summer_item,
            'winter_item'=>$winter_item,
            'fall_item'=>$fall_item,
            'spring_item'=>$spring_item

            ]);


    }
    public function showItemWithAuth(){
        $slider = Product::where('status','Visibile')
            ->orderBy('created_at','desc')
            ->limit(3)
            ->get();
            $item=Product::where('status','Visibile')
            ->orderBy('created_at','desc')
            ->limit(6)
            ->get();
            $summer_item=Product::where('season','Summer')
            ->where('status','Visibile')
            ->orderBy('created_at','desc')
            ->limit(6)
            ->get();
            $winter_item=Product::where('season','Winter')
            ->where('status','Visibile')
            ->orderBy('created_at','desc')
            ->limit(6)
            ->get();
            $fall_item=Product::where('season','Fall')
            ->where('status','Visibile')
            ->orderBy('created_at','desc')
            ->limit(6)
            ->get();
            $spring_item=Product::where('season','Spring')
            ->where('status','Visibile')
            ->orderBy('created_at','desc')
            ->limit(6)
            ->get();



            return view('website.index',
            ['slider'=>$slider,
            'item'=>$item,
            'summer_item'=>$summer_item,
            'winter_item'=>$winter_item,
            'fall_item'=>$fall_item,
            'spring_item'=>$spring_item

            ]);
    }
}
