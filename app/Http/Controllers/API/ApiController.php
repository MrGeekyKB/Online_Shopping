<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\MultipleImages;
use App\Models\Cart;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $products=Products::all();
      $images=MultipleImages::all();

      return response()->json([
      'isSuccess' => true,
      'data' => [
          'products' => $products,
          'images' => $images
      ]
  ]);



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
    public function store(Request $request)
    {
        //
    }

    public function store_to_cart(Request $request)
    {
        $request->validate([
          'user_id'=>'required',
          'product_id'=>'required',
          'status'=>'required',
        ]);
        $Cart=new Cart();
        $Cart->user_id=$request->input('user_id');
        $Cart->product_id=$request->input('product_id');
        $Cart->status=$request->input('status');

        $Cart->save();
        return response()->json([
        'isSuccess' => true,
        'data' => [
            'sent' => $Cart,
        ]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function show_user_cart($id)
    {
      $cart_items=Cart::where('user_id', $id)->where('status', 1)->get();

        return response()->json([
          'isSuccess' => true,
          'data' => [
              'recieved' => $cart_items,
          ]
          ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
