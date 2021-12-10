<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagination = 9;

        if(request()->category){
            $products = Product::with('categories')->whereHas('categories', function($query) {
                $query->where('slug', request()->category);
            });
            $categories = Category::all();
        } else {
             $products = Product::take(12);
             $categories = Category::all();
        }

        if(request()->sort == 'low_high') {
            $products = $products->orderBy('price')->paginate($pagination);
        } elseif(request()->sort == 'high_low') {
            $products = $products->orderBy('price', 'desc')->paginate($pagination);
        } else {
            $products = $products->paginate($pagination);
        }

        return view('shop', [
            'products' => $products,
            'categories' => $categories
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show(Product $product)
     {
        $mightAlsoLike = Product::where('slug', '!=', $product)->inRandomOrder()->take(4)->get();
        return view('product', [
            'product' => $product,
            'mightAlsoLike' => $mightAlsoLike
        ]);
     }

     public function search(Request $request)
     {
         $request->validate([
            'query' => 'sometimes|nullable|min:1',
         ]);
         $query = $request->input('query');
         // $products = Product::where('name', 'like', "%$query%")
         //                        ->orWhere('details', 'like', "%$query%")
         //                        ->orWhere('price', 'like', "%$query%")
         //                        ->paginate(6);

         $products = Product::search($query)->paginate(6);

         return view('search-result')->with('products', $products);
     }
}
