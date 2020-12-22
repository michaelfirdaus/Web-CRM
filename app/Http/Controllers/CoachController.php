<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Coach;
use Session;

class CoachController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('coach.index')->with('coaches', Coach::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('coach.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $coach = new Coach;

        $coach->name = $request->name;
        //Saving current category to the database
        $coach->save();

        //Notify user with pop up message
        Session::flash('success', 'Berhasil Menambahkan Coach Baru');

        //Redirecting user to categories route
        return redirect()->route('coaches');
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
        //Find category based on category ID
        $coach = Coach::find($id);

        //Redirecting user to admin/categories/edit view with the specific category
        return view('coach.edit')->with('coach', $coach); 
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
        $coach = Coach::find($id);
        
        $coach->name = $request->name;
        
        //Save the category to the database
        $coach->save();

        //Notify user with pop up message
        Session::flash('success', 'Berhasil Memperbaharui Coach');

        //Redirecting user to categories route
        return redirect()->route('coaches');
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
         $coach = Coach::find($id);

         //Delete category
         $coach->delete();
 
         //Notify user with pop up message
         Session::flash('success', 'Berhasil Menghapus Coach');
 
         //Redirecting user to categories route
         return redirect()->route('coaches');
    }
}