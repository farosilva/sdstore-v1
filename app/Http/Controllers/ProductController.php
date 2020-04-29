<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductVariant;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.index', ['products' => $this->getProductsByCategories()]);
    }

    public function showProduct($product)
    {
        $split = collect(explode('-', $product));
        $sku = $split->shift();
        $name = $split->implode(' ');

        $result = Product::where('name', $name)->first();
        $product = $result->variants->where('sku', $sku)->first();

        if(isset($product) && $product->status == 'A'){
            return view('products.one', ['product' => $product]);
        }else{
            return redirect()->route('products');
        }

    }

    public function getFeatured()
    {
        return ProductVariant::featured()
            ->with('stocks')->get()->where('stocks.avaiable', 1);
    }

    public function getProducts()
    {
        $products = ProductVariant::active()->with('stocks')->get();
        return $products->where('stocks.avaiable', 1);
    }

    public function getProductsByCategories()
    {
        $products = $this->getProducts();
        return $products->groupBy('category_name')->sortkeys()->makeHidden('subcategories');
    }

    public function getVariants($sku)
    {
        $product = ProductVariant::find($sku);
        return $product->products->variants->where('sku', '<>', $product->sku);
    }
}
