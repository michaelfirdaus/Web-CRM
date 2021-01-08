<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Programcategory;
use Session;

class ProgramcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programcategories = Programcategory::all();

        return view('programcategory.index')
               ->with('programcategories', $programcategories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('programcategory.create');
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
            'name' => 'required|unique:programcategories',
        ];

        $customMessages = [
            'name.required' => 'Nama Kategori Program harus diisi.',
            'name.unique'   => 'Nama Kategori Program sudah terdaftar, silahkan coba lagi.',
        ];

        $this->validate($request, $rules, $customMessages);

        $programcategory = Programcategory::create([
            'name'          => $request->name
        ]);

        Session::flash('success', 'Berhasil Menambahkan Kategori Program');

        return redirect()->route('programcategories');
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
        $programcategory = Programcategory::find($id);

        return view('programcategory.edit')->with('programcategory', $programcategory);
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
            'name' => 'required',
        ];

        $customMessages = [
            'name.required' => 'Nama Kategori Program harus diisi.',
        ];

        $this->validate($request, $rules, $customMessages);

        $programcategory = Programcategory::find($id);

        $this->validate($request, [
            'name'              => 'required',
        ]);

        $programcategory->id        = $request->id;
        $programcategory->name      = $request->name;

        $programcategory->save();

        Session::flash('success', 'Berhasil Memperbaharui Kategori Program');

        return redirect()->route('programcategories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $programcategory = Programcategory::find($id);

        $programcategory->delete();


        Session::flash('success', 'Berhasil Menghapus Kategori Program');
        return redirect()->route('programcategories');
    }
}
