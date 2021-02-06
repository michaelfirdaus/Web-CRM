<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Program;
use App\Branch;
use App\Programcategory;
use App\Programname;
use Session;
use DataTables;
use Auth;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $programs = Program::with('programcategory','programname', 'branch');

        if($request->ajax()){
            return DataTables::of($programs)
                ->addColumn('Edit', function($programs){
                    return 
                    "<div class='text-center'>
                        <a href='".route('program.edit', ['id' => $programs ->id])."' class='btn btn-xs btn-info'>
                            <span class='fas fa-pencil-alt'></span>
                        </a>
                    </div>";
                })
                ->editColumn('date', function($programs){
                    return
                    "<div class='text-center'>".$programs->date."</div>";
                })
                ->editColumn('branch.name', function($programs){
                    return
                    "<div class='text-center'>".$programs->branch->name."</div>";
                })
                ->editColumn('created_by', function($programs){
                    return "<div class='text-center'>".$programs->created_by."</div>";
                })
                ->editColumn('lastedited_by', function($programs){
                    return "<div class='text-center'>".$programs->lastedited_by."</div>";
                })
                ->rawColumns(['Edit', 'date', 'branch.name', 'created_by', 'lastedited_by'])
                ->make();
        }

        return view('program.index')
            ->with('programs', $programs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branches = Branch::where('status',1)->get();
        $programnames = Programname::where('status',1)->get();
        $programcategories = Programcategory::where('status',1)->get();

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
            'created_by'         => Auth::user()->name,
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
        $program->lastedited_by      = Auth::user()->name;

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
