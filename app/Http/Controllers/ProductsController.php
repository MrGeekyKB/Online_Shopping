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
        return view('admin.add_step2');
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
        //
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

       $form= new MultipleImages();
       $form->filename=json_encode($data);


      $form->save();

      return back()->with('success', 'Your images has been successfully');
    }
}
