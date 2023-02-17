<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\{Sell, Product};
use Illuminate\Support\Facades\Auth;

class SellController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('sell.index', ['products' => $products]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sell = new Sell;
        $sell->user_id = auth()->user()->id;
        $sell->product_id = $request->product_id;
        $sell->save();
        return redirect('/sell');
    }

}
