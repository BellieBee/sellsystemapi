<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\{Product};

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product = false;
        $show = false;
        return view('product.create', [ 'product' => $product, 'show' => $show ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->id !== '') {
            $product = Product::find($request->id);
        }
        else {
            $product = new Product;
        }
        $product->name = $request->name;
        $product->price = $request->price;
        $product->tax = $request->tax;
        $product->save();

        return redirect('/product');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $show = true;
        $product = Product::find($id);
        return view('product.create', ['product' => $product, 'show' => $show]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $show = false;
        $product = Product::find($id);
        return view('product.create', ['product' => $product, 'show' => $show]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/product');
    }
}
