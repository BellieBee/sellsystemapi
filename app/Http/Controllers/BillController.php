<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\{Bill, Sell, SellBill, User};
use Illuminate\Support\Facades\DB;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $bills = Bill::all();
        return view('bill.index', ['users' => $users, 'bills' => $bills]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_ids = $request->user_id;
        try {
            DB::beginTransaction();
            foreach ($user_ids as $user_id) {
                $user = User::find($user_id);
                $sells = array();
                $total_tax = 0;
                $total_price = 0;
                foreach ($user->sells as $sell) {
                    $tax_amount = 0;
                    if ($sell->is_checked === 0) {
                        $tax_amount = ($sell->products->price)*($sell->products->tax / 100);
                        $total_tax = $total_tax + $tax_amount;
                        $total_price = $total_price + ($tax_amount + $sell->products->price);
                        array_push($sells, $sell);
                    }
                }
                $bill = new Bill;
                $bill->user_id = $user_id;
                $bill->total_tax = $total_tax;
                $bill->total_price = $total_price;
                $bill->save();
                foreach ($sells as $sell) {
                    $sell_bill = new SellBill;
                    $sell_bill->bill_id = $bill->id;
                    $sell_bill->sell_id = $sell->id;
                    $sell_bill->save();

                    $update_sell = Sell::find($sell->id);
                    $update_sell->is_checked = 1;
                    $update_sell->save();
                }
            }
            DB::commit();
        } catch (\Exception $th) {
            DB::rollBack();
            return redirect('/bill')->withErrors("Something was wrong");
        }

        return redirect('/bill');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $bill = Bill::find($id);
        return view('bill.show', ['bill' => $bill]);
    }

}
