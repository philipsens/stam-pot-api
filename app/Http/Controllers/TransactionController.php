<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Transaction[]|Collection|Response
     */
    public function index()
    {
        return Transaction::all()->sortByDesc('date')->values()->load('customer', 'product');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Request
     */
    public function store(Request $request)
    {
        return Transaction::create([
            'id' => Str::uuid(),
            'customer_id' => $request->customer,
            'product_id' => $request->product,
            'amount' => Product::find($request->product)->price,
            'date' => Carbon::now()
        ])->date;
    }

    /**
     * Display the specified resource.
     *
     * @param Customer $customer
     * @return Collection
     */
    public function show(Customer $customer)
    {
        return $customer->transactions()->with('customer', 'product')->get()->sortByDesc('date')->values();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Transaction $transaction
     * @return void
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Transaction $transaction
     * @return void
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Transaction $transaction
     * @return void
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
