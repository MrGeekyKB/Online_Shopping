<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\MultipleImages;

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

        $Product->save();
        return redirect('step2');
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
}
