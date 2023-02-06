<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderShowRequest;
use App\Http\Requests\OrderStoreRequest;
use App\Http\Resources\OrderCollection;
use App\Http\Resources\OrderShowResource;
use App\Models\Change;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($code)
    {
        return new OrderCollection(Order::query()->where('change_id', $code)->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderStoreRequest $request)
    {
        $change = Change::query()->orderByDesc('id')->first();
        foreach ($request->orders as $order) {
            if (!isset($order['status'])) {
                $order['status'] = "принят";
            }
            Order::query()->create([
                'book_id' => $request->book_id,
                'dish' => $order['dish'],
                'change_id' => $change->id,
                'status' => $order['status']
            ]);
        }
        return response()->json([
            "data" => [
                "code" => "QSASE"
            ]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(OrderShowRequest $request, $id)
    {
        return new OrderShowResource(Order::query()->where('id', $id)->where('status', $request->orders['status'])->first());
    }

    public function showChange(OrderShowRequest $request, $id)
    {
        return new OrderShowResource(Order::query()->where('id', $id)->where('status', $request->orders['status'])->first());
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
