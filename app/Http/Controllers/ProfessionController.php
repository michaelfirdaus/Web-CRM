<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Profession;
use Session;

class ProfessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profession.index')->with('professions', Profession::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profession.create');
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
            'name' => 'required|unique:professions',
        ];

        $customMessages = [
            'name.required' => 'Nama Profesi harus diisi.',
            'name.unique'   => 'Nama Profesi sudah terdaftar, silahkan coba lagi.'
        ];

        $this->validate($request, $rules, $customMessages);

        $profession = new Profession;

        $profession->name = $request->name;

        $profession->save();

        Session::flash('success', 'Berhasil Menambahkan Profesi Baru');

        return redirect()->route('professions');

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
        $profession = Profession::find($id);

        return view('profession.edit')->with('profession', $profession);
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
            'name.required' => 'Nama Profesi harus diisi.',
        ];

        $this->validate($request, $rules, $customMessages);

        $profession = Profession::find($id);

        $profession->name = $request->name;

        $profession->save();

        Session::flash('success', 'Berhasil Memperbaharui Profesi');

        return redirect()->route('professions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profession = Profession::find($id);

        $profession->delete();

        Session::flash('success', 'Berhasil Menghapus Profesi');

        return redirect()->route('professions');
    }
}
