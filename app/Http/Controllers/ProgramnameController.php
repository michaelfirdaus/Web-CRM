<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Programname;
use Session;

class ProgramnameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programnames = Programname::all();
        return view('programname.index')->with('programnames', $programnames);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('programname.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name'   => 'required|unique:programnames',
            'status' => 'required'      
        ];

        $customMessages = [
            'name.required'   => 'Nama Program harus diisi.',
            'name.unique'     => 'Nama Program sudah terdaftar, silahkan coba lagi.',
            'status.required' => 'Status Program harus dipilih.'
        ];

        $this->validate($request, $rules, $customMessages);

        $pn = new Programname;

        $pn->name   = $request->name;
        $pn->status = $request->status;
        //Saving current category to the database
        $pn->save();

        //Notify user with pop up message
        Session::flash('success', 'Berhasil Menambahkan Nama Program Baru');

        //Redirecting user to categories route
        return redirect()->route('programnames');
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
        $pn = Programname::find($id);

        return view('programname.edit')->with('programname', $pn);
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
            'name.required' => 'Nama Program harus diisi.',
            'status.required' => 'Status Program harus dipilih.'
        ];

        $this->validate($request, $rules, $customMessages);

        //Find category based on category ID
        $pn = Programname::find($id);
        
        $pn->name   = $request->name;
        $pn->status = $request->status; 
        //Save the category to the database
        $pn->save();

        //Notify user with pop up message
        Session::flash('success', 'Berhasil Memperbaharui Program Course-Net');

        //Redirecting user to categories route
        return redirect()->route('programnames');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pn = Programname::find($id);

        $pn->delete();

        Session::flash('success', 'Berhasil Menghapus Program');
        return redirect()->route('programnames');
    }
}
