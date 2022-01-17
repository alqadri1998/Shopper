<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    public function setResultSearch(Request $request)
    {

        if (\request()->ajax()) {

            $output = '';
            $query = request()->get('search');
            if($query == ''){
                return response($output);
            }
            $output .= '<h2 class="title text-center">Search Items</h2>';
            $Products = Product::where('name', 'LIKE', '%' . $query . '%')
                ->orWhere('sell_price', 'LIKE', '%' . $query . '%')
                ->orWhere('details', 'LIKE', '%' . $query . '%')
                ->orWhere('gender', 'LIKE', '%' . $query . '%')
                ->orWhere('size', 'LIKE', '%' . $query . '%')
                ->orWhere('type', 'LIKE', '%' . $query . '%')
                ->orWhere('season', 'LIKE', '%' . $query . '%')
                ->orderBy('id', 'asc')
                ->paginate(6);
                foreach($Products as $product){
                    $output .=  ' <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                                <div class="productinfo text-center">
                                    <img width="100" height="100" src="'.url('images/products/'.$product->product_image).' " />
                                    <h2>'. $product->sell_price .'</h2>
                                    <p>'. $product->details. '</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2>'. $product->sell_price .'</h2>
                                        <p>' .$product->name .'</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                </div>
                        </div>
                        <div class="choose">
                            <ul class="nav nav-pills nav-justified">
                                <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>

                            </ul>
                        </div>
                    </div>
                </div>';

                }



               // $output .= $Products->links();
               // $request->session->flash()(['data'=>$output]);




                // return response()->json([
                //     'status' => true,
                //     'message' => 'Success',
                //     'data' => $output
                // ]);
                return response($output);


        }


    }


}
