<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Knowcn;
use Session;

class KnowcnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('knowcn.index')->with('knowcns', Knowcn::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('knowcn.create');
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

        $rules = [
            'name'   => 'required|unique:knowcns',
            'status' => 'required'      
        ];

        $customMessages = [
            'name.required'   => 'Nama Kanal harus diisi.',
            'name.unique'     => 'Nama Kanal sudah terdaftar, silahkan coba lagi.',
            'status.required' => 'Status Kanal harus dipilih.'
        ];

        $this->validate($request, $rules, $customMessages);

        $knowcn = new Knowcn;

        $knowcn->name   = $request->name;
        $knowcn->status = $request->status;
        //Saving current category to the database
        $knowcn->save();

        //Notify user with pop up message
        Session::flash('success', 'Berhasil Menambahkan Kanal Baru');

        //Redirecting user to categories route
        return redirect()->route('knowcns');
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
        $knowcn = Knowcn::find($id);

        //Redirecting user to admin/categories/edit view with the specific category
        return view('knowcn.edit')->with('knowcn', $knowcn); 
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
        $rules = [
            'name'   => 'required',
            'status' => 'required'
        ];

        $customMessages = [
            'name.required' => 'Nama Kanal harus diisi.',
            'status.required' => 'Status Kanal harus dipilih.'
        ];

        $this->validate($request, $rules, $customMessages);

        //Find category based on category ID
        $knowcn = Knowcn::find($id);
        
        $knowcn->name   = $request->name;
        $knowcn->status = $request->status; 
        //Save the category to the database
        $knowcn->save();

        //Notify user with pop up message
        Session::flash('success', 'Berhasil Memperbaharui Kanal Course-Net');

        //Redirecting user to categories route
        return redirect()->route('knowcns');
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
        $knowcn = Knowcn::find($id);

        //Delete category
        $knowcn->delete();

        //Notify user with pop up message
        Session::flash('success', 'Berhasil Menghapus Kanal Course-Net');

        //Redirecting user to categories route
        return redirect()->route('knowcns');
    }
}
