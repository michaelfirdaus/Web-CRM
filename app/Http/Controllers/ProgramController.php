<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Program;
use App\Branch;
use Session;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programs = Program::all();
        $branches = Branch::all();

        return view('program.index')
            ->with('programs', $programs)
            ->with('branches', $branches);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branches = Branch::all();

        if($branches->count() == 0){
            Session::flash('info', 'Tidak Dapat Menambahkan Program karena Tidak Ada Cabang yang Terdaftar');
            return redirect()->back();
        }

        return view('program.create')->with('branches', $branches);
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
            'name'              => 'required|unique:programs',
            'branch_location'   => 'required',
        ]);

        $programs = Program::create([
            'name'          => $request->name,
            'branch_id'     => $request->branch_location
        ]);

        Session::flash('success', 'Berhasil Menambahkan Program');

        return redirect()->route('programs');
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
        $program = Program::find($id);
        $branches = Branch::all();
        $current_branch = $program->branch->id;

        return view('program.edit')
            ->with('program', $program)
            ->with('branches', $branches)
            ->with('current_branch', $current_branch);
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
        $program = Program::find($id);

        $this->validate($request, [
            'name'              => 'required',
            'branch_location'   => 'required',
        ]);

        $program->id        = $request->id;
        $program->name      = $request->name;
        $program->branch_id = $request->branch_location;

        $program->save();

        Session::flash('success', 'Berhasil Memperbaharui Program');

        return redirect()->route('programs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $program = Program::find($id);

        $program->delete();

        Session::flash('success', 'Berhasil Menghapus Program');

        return redirect()->route('programs');
    }
}
