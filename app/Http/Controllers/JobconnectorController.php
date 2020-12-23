<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Jobconnector;
use Session;

class JobconnectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('jobconnector.index')->with('jobconnectors', Jobconnector::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jobconnector.create');
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
            'name'      => 'required',
            'location'  => 'required'
        ]);

        $jobconnector = new Jobconnector;

        $jobconnector->company_name = $request->name;
        $jobconnector->location = $request->location;
        //Saving current category to the database
        $jobconnector->save();

        //Notify user with pop up message
        Session::flash('success', 'Berhasil Menambahkan Perusahaan');

        //Redirecting user to categories route
        return redirect()->route('jobconnectors');
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
        $jobconnector = Jobconnector::find($id);

        //Redirecting user to admin/categories/edit view with the specific category
        return view('jobconnector.edit')->with('jobconnector', $jobconnector); 
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
        $jobconnector = Jobconnector::find($id);
        
        $jobconnector->company_name = $request->name;
        $jobconnector->location = $request->location;
        
        //Save the category to the database
        $jobconnector->save();

        //Notify user with pop up message
        Session::flash('success', 'Berhasil Memperbaharui Perusahaan');

        //Redirecting user to categories route
        return redirect()->route('jobconnectors');
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
        $jobconnector = Jobconnector::find($id);

        //Delete category
        $jobconnector->delete();

        //Notify user with pop up message
        Session::flash('success', 'Berhasil Menghapus Perusahaan');

        //Redirecting user to categories route
        return redirect()->route('jobconnectors');
    }
}
