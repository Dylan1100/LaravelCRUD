<?php

namespace App\Http\Controllers;
use App\items;
use Image;

use Illuminate\Http\Request;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = items::all();
        $id = items::select('select id from items');
        return view ('pages.items')->withItems($items);    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('pages.items.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'catagory' => 'required|unique:items,catagory',
            'title' => 'required|unique:items,title',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'sku' => 'required|numeric|unique:items,sku',
            'featured_img' => 'required'
        ));


        //Store to DB
        $items = new items;

        $items->catagory = $request->catagory;
        $items->title = $request->title;
        $items->description = $request->description;
        $items->price = $request->price;
        $items->quantity = $request->quantity;
        $items->sku = $request->sku;

        //image upload
        if ($request->hasFile('featured_img')) {
            $image = $request->file('featured_img');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);
  
            $items->image = $filename;
          }

        $items->save();

        //Session::flash('success', 'the entry was added');

        return redirect('items');

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
        $items = items::find($id);
        return view('pages.items.edit')->withItem($items);
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
        $this->validate($request, array(
            'catagory' => 'required|unique:items,catagory',
            'title' => 'required|unique:items,title',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'sku' => 'required|numeric|unique:items,sku',
            'featured_img' => 'required'
        ));

        //Store edit to DB
        $items = items::find($id);

        $items->catagory = $request->input('catagory');
        $items->title = $request->input('title');
        $items->description = $request->input('description');
        $items->price = $request->input('price');
        $items->quantity = $request->input('quantity');
        $items->sku = $request->input('sku');


        if ($request->hasFile('featured_img')) {
            $image = $request->file('featured_img');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);
  
            $items->image = $filename;
          }

        $items->save();

        return redirect('items');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $items = items::find($id);

        $items->delete();

        return redirect('items');    
    }
}
