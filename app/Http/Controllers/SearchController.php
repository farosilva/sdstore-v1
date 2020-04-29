<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductVariant;

class SearchController extends Controller
{
    public function searchByName()
    {
        if(request()->search){
            $products = Product::where('name', 'like','%'.request()->search.'%')->get();

            if($products->count() > 0){
                foreach ($products as $product) {
                    $prods[] = $product->variants->pluck('sku');
                }

                foreach ($prods as $item) {
                    foreach ($item as $v) {
                        $skus[] = $v;
                    }
                }
            }else{
                $skus = [];
            }

            return view('search', ['products' => ProductVariant::whereIn('sku', $skus)->get()]);

        }
        return redirect()->route('home');
    }
    // public function searchByName()
    // {
    //     if(request()->search){
    //         $products = Product::where('name', 'like','%'.request()->search.'%')->get();

    //         foreach ($products as $product) {
    //             $skus[] = $product->variants->pluck('sku');
    //         }

    //         foreach ($skus as $item) {
    //             foreach ($item as $v) {
    //                 $prods[] = $v;
    //             }
    //         }

    //         return view('search', ['products' => ProductVariant::whereIn('sku', $prods)->get()]);

    //     }
    //     return redirect()->route('home');
    // }
}
