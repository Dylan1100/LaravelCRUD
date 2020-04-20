<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\catagory;
class CatagoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catagories = catagory::all();
        $id = catagory::select('select id from catagory');
        return view ('pages.catagories')->withCatagories($catagories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('pages.catagories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $this->validate($request, array(
            'catagory' => 'required|unique:catagory'

            
        ));

        

        //Store to DB
        $catagory = new catagory;

        $catagory->catagory = $request->catagory;
        $catagory->save();

        //Session::flash('success', 'the entry was added');

        return redirect('catagories');

        //return redirect()->route('catagories.show', $catagory->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $catagory = catagory::find($id);
        return view('pages.catagories.edit')->withCatagory($catagory);

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
                //validation again
                $this->validate($request, array(
                    'catagory' => 'required|unique:catagory'
                ));
        
                //Store edit to DB
                $catagory = catagory::find($id);
        
                $catagory->catagory = $request->input('catagory');
                $catagory->save();
        
                //Session::flash('success', 'the entry was added');
        
                return redirect('catagories');
        
                //return redirect()->route('catagories.show', $catagory->id);
        
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
