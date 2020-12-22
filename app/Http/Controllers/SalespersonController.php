<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Salesperson;
use Session;

class SalespersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('salesperson.index')->with('salespersons', Salesperson::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('salesperson.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validation to make sure name field should be filled and the category must be unique
        $this->validate($request, [
            'name' => 'required',
        ]);

        $salesperson = new Salesperson;

        $salesperson->name = $request->name;
        //Saving current category to the database
        $salesperson->save();

        //Notify user with pop up message
        Session::flash('success', 'Berhasil Menambahkan Sales Baru');

        //Redirecting user to categories route
        return redirect()->route('salespersons');

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
        //Find category based on category ID
        $salesperson = Salesperson::find($id);

        //Redirecting user to admin/categories/edit view with the specific category
        return view('salesperson.edit')->with('salesperson', $salesperson); 
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
        //Find category based on category ID
        $salesperson = Salesperson::find($id);
        
        $salesperson->name = $request->name;
        
        //Save the category to the database
        $salesperson->save();

        //Notify user with pop up message
        Session::flash('success', 'Berhasil Memperbaharui Sales');

        //Redirecting user to categories route
        return redirect()->route('salespersons');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Find category based on category ID
        $salesperson = Salesperson::find($id);

        //Delete category
        $salesperson->delete();

        //Notify user with pop up message
        Session::flash('success', 'Berhasil Menghapus Sales');

        //Redirecting user to categories route
        return redirect()->route('salespersons');
    }
}
