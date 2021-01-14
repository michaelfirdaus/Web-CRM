<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Branch;
use Session;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('branch.index')->with('branches', Branch::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('branch.create');
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
            'name'   => 'required',
            'code'   => 'required|numeric|unique:branches',
            'status' => 'required|boolean'
        ];

        $customMessages = [
            'name.required'   => 'Nama Cabang harus diisi.',
            'code.required'   => 'Kode Cabang harus diisi.',
            'code.unique'     => 'Kode Cabang sudah terdaftar, silahkan coba lagi.',
            'code.numeric'    => 'Kode Cabang harus angka.',
            'status.required' => 'Status Cabang harus dipilih.'
        ];

        $this->validate($request, $rules, $customMessages);

        $branch = new Branch;

        $branch->name   = $request->name;
        $branch->code   = $request->code;
        $branch->status = $request->status;
        //Saving current category to the database
        $branch->save();

        //Notify user with pop up message
        Session::flash('success', 'Berhasil Menambahkan Cabang');

        //Redirecting user to categories route
        return redirect()->route('branches');
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
        $branch = Branch::find($id);

        //Redirecting user to admin/categories/edit view with the specific category
        return view('branch.edit')->with('branch', $branch); 
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
            'code'   => 'required|numeric',
            'status' => 'required|boolean'
        ];

        $customMessages = [
            'name.required'   => 'Nama Cabang harus diisi.',
            'code.required'   => 'Kode Cabang harus diisi.',
            'code.unique'     => 'Kode Cabang sudah terdaftar, silahkan coba lagi.',
            'code.numeric'    => 'Kode Cabang harus angka.',
            'status.required' => 'Status Cabang harus dipilih.'
        ];

        $this->validate($request, $rules, $customMessages);

        //Find category based on category ID
        $branch = Branch::find($id);
        
        $branch->name   = $request->name;
        $branch->code   = $request->code;
        $branch->status = $request->status;
        
        //Save the category to the database
        $branch->save();

        //Notify user with pop up message
        Session::flash('success', 'Berhasil Memperbaharui Cabang');

        //Redirecting user to categories route
        return redirect()->route('branches');
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
        $branch = Branch::find($id);

        //Delete category
        $branch->delete();

        //Notify user with pop up message
        Session::flash('success', 'Berhasil Menghapus Cabang');

        //Redirecting user to categories route
        return redirect()->route('branches');
    }
}
