<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\MultipleImages;
use App\Models\Cart;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function index_step2()
    {
      $id=Products::orderBy('id', 'DESC')->pluck('id')->first();
        return view('admin.add_step2', compact('id'));
    }

    public function index_step3()
    {
      $product_id=session('product_id');
      $product=Products::where('id', $product_id)->get();
      $images=MultipleImages::where('product_id', $product_id)->pluck('filename')->first();
        return view('admin.add_step3', compact('product','images'));
    }

    public function index_my_products()
    {
      $products=Products::all();
        return view('admin.my_products', compact('products'));
    }

    public function index_user_all_products()
    {
      $products=Products::all();
        return view('user.products', compact('products'));
    }
    public function checkout()
    {

        return view('dashboard')->with('success', 'Order Placed Successfully');
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
        $request->validate([
          'name'=>'required',
          'price'=>'required',
        ]);
        $Product=new Products();
        $Product->name=$request->input('name');
        $Product->price=$request->input('price');
        $Product->publish=0;

        $Product->save();
        return redirect('step2');
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
        return back()->with('success', 'Item successfully Added to Cart');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $product=Products::where('id', $id)->get();
      $images=MultipleImages::where('product_id', $id)->pluck('filename')->first();
        return view('product', compact('product','images'));
    }

    public function show_user($id)
    {
      $product=Products::where('id', $id)->get();
      $images=MultipleImages::where('product_id', $id)->pluck('filename')->first();
        return view('user.product_details', compact('product','images'));
    }

    public function show_user_cart($id)
    {
      $cart_items=Cart::where('user_id', $id)->where('status', 1)->get();
        return view('user.cart', compact('cart_items'));
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

    public function store_images(Request $request)
    {
      $this->validate($request, [
              'product_id' => 'required',
              'filename' => 'required',
              'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

      ]);

      if($request->hasfile('filename'))
       {

          foreach($request->file('filename') as $image)
          {
              $name=$image->getClientOriginalName();
              $image->move(public_path().'/images/', $name);
              $data[] = $name;
          }
       }

       $product_id=$request->input('product_id');
       $form= new MultipleImages();
       $form->product_id=$request->input('product_id');
       $form->filename=json_encode($data);


      $form->save();

      return redirect('step3')->with('success', 'Your images has been successfully Uploaded')->with('product_id', $product_id);
    }

    public function publish(Request $request)
    {
        $request->validate([
          'product_id'=>'required',
          'publish'=>'required',
        ]);
        $id=$request->input('product_id');
        $Product=Products::findOrFail($id);
        $Product->publish=$request->input('publish');

        $Product->save();
        return redirect('/admin')->with('success', 'Your Product has been successfully Published');
    }

    public function cart_item_remove($id)
    {
        $Remove_item=Cart::findOrFail($id);
        $Remove_item->status=0;

        $Remove_item->save();
        return back()->with('success', 'Item Removed from Cart');
    }
}
