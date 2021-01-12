<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Program;
use App\Branch;
use App\Programcategory;
use App\Programname;
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
        $programs = Program::with('programcategory','programname')->get();
        $programcategories = Programcategory::all();
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
        $programnames = Programname::all();
        $programcategories = Programcategory::all();

        if($branches->count() == 0 || $programnames->count() == 0 || $programcategories->count() == 0){
            Session::flash('info', 'Tidak Dapat Menambahkan Batch Program karena Tidak Ada Cabang/Kategori Program/Program yang Terdaftar');
            return redirect()->back();
        }

        return view('program.create')
               ->with('programcategories', $programcategories)
               ->with('programnames', $programnames)
               ->with('branches', $branches);
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
            'programname'       => 'required',
            'branch_location'   => 'required',
            'programcategory'   => 'required',
            'date'              => 'required|date',
        ];

        $customMessages = [
            'programname.required'     => 'Nama Program harus dipilih.',
            'branch_location.required' => 'Lokasi Cabang harus dipilih.',
            'programcategory.required' => 'Kategori Program harus dipilih.',
            'date.required'            => 'Tanggal Batch harus diisi.',
            'date.date'                => 'Tanggal Batch harus berupa tanggal.'
        ];

        $this->validate($request, $rules, $customMessages);

        $programs = Program::create([
            'programname_id'     => $request->programname,
            'branch_id'          => $request->branch_location,
            'programcategory_id' => $request->programcategory,
            'date'               => $request->date,
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
        $programnames = Programname::all();
        $branches = Branch::all();
        $programcategories = Programcategory::all();
        $current_branch = $program->branch->id;

        return view('program.edit')
            ->with('program', $program)
            ->with('branches', $branches)
            ->with('programnames', $programnames)
            ->with('programcategories', $programcategories)
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

        $rules = [
            'programname'       => 'required',
            'branch_location'   => 'required',
            'programcategory'   => 'required',
            'date'              => 'required|date'
        ];

        $customMessages = [
            'programname.required'     => 'Nama Program harus diisi.',
            'branch_location.required' => 'Lokasi Cabang harus dipilih.',
            'programcategory.required' => 'Kategori Program harus dipilih.',
            'date.required'            => 'Tanggal Batch harus dipilih.',
            'date.date'                => 'Tanggal Batch harus berupa tanggal.'
        ];

        $this->validate($request, $rules, $customMessages);

        $program->id                 = $request->id;
        $program->programname_id     = $request->programname;
        $program->branch_id          = $request->branch_location;
        $program->programcategory_id = $request->programcategory;
        $program->date               = $request->date;

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
