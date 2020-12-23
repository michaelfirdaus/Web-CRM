<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Programpivot;
use App\Program;
use App\Coach;
use Session;

class ProgrampivotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programpivots = Programpivot::all();
        $programs = Program::all();
        $coaches = Coach::all();

        return view('programpivot.index')
            ->with('programpivots', $programpivots)
            ->with('programs', $programs)
            ->with('coaches', $coaches);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $programpivots = Programpivot::all();
        $programs = Program::all();
        $coaches = Coach::all();

        if($programs->count() == 0 || $coaches->count() == 0){
            Session::flash('info', 'Tidak Dapat Menambahkan Jadwal Kelas karena Program/Coach Tidak Tersedia');
            return redirect()->back();
        }

        return view('programpivot.create')
            ->with('programpivots', $programpivots)
            ->with('programs', $programs)
            ->with('coaches', $coaches);

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
            'program'           => 'required',
            'coach'             => 'required',
            'date'              => 'required',
        ]);

        $programpivot = Programpivot::create([
            'program_id'    => $request->program,
            'coach_id'      => $request->coach,
            'date'          => $request->date
        ]);

        Session::flash('success', 'Berhasil Menambahkan Jadwal Kelas');

        return redirect()->route('programpivots');
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
        $programpivot = Programpivot::find($id);
        $programs = Program::all();
        $coaches = Coach::all();

        return view('programpivot.edit')
            ->with('programpivot', $programpivot)
            ->with('programs', $programs)
            ->with('coaches', $coaches);
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
        $programpivot = Programpivot::find($id);
        $programs = Program::all();
        $coaches = Coach::all();

        $this->validate($request, [
            'program'           => 'required',
            'coach'             => 'required',
            'date'              => 'required',
        ]);

        $programpivot->id           = $request->id;
        $programpivot->coach_id     = $request->coach;
        $programpivot->program_id   = $request->program;
        $programpivot->date         = $request->date;

        $programpivot->save();

        Session::flash('success', 'Berhasil Memperbaharui Jadwal Kelas');

        return redirect()->route('programpivots');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $programpivot = Programpivot::find($id);

        $programpivot->delete();

        Session::flash('success', 'Berhasil Menghapus Jadwal Kelas');

        return redirect()->route('programpivots');
    }
}
