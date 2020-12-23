<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Program;
use App\Coach;
use App\CoachProgram;
use App\Branch;
use Session;
use DB;

class ProgrampivotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coachprograms = CoachProgram::all();
        $programs = Program::with('coaches','branch')->get();

        return view('programpivot.index')
        ->with('programs', $programs)
        ->with('coachprograms', $coachprograms);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $programs = Program::all();
        $coaches = Coach::all();
        $branches = Branch::all();

        if($programs->count() == 0 || $coaches->count() == 0){
            Session::flash('info', 'Tidak Dapat Menambahkan Jadwal Kelas karena Program/Coach Tidak Tersedia');
            return redirect()->back();
        }

        return view('programpivot.create')
            ->with('programs', $programs)
            ->with('branches', $branches)
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
            'program' => 'required',
            'coach'   => 'required',
            'date'    => 'required',    
        ]);

        foreach($request->coach as $coach){
            DB::table('coach_program')->insert([
                'coach_id'      => $coach,
                'program_id'    => $request->program,
                'date'          => $request->date,
            ]);
        }

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

        $coachprogram = CoachProgram::find($id);
        $current_program = Program::find($coachprogram->program_id);
        $programs = Program::all();
        $coaches = Coach::all();
        $branches = Branch::all();

        return view('programpivot.edit')
            ->with('coachprogram', $coachprogram)
            ->with('programs', $programs)
            ->with('current_program', $current_program)
            ->with('branches', $branches)
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
        $coachprogram = CoachProgram::find($id);

        $this->validate($request, [
            'program' => 'required',
            'coach'   => 'required',
            'branch'  => 'required',
            'date'    => 'required',
        ]);

        $coachprogram->id           = $request->id;
        $coachprogram->coach_id     = $request->coach;
        $coachprogram->program_id   = $request->program;
        $coachprogram->date         = $request->date;

        $coachprogram->save();

        $program = Program::find($coachprogram->program_id);

        $program->branch_id = $request->branch;

        $program->save();

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
        $coachprogram = CoachProgram::find($id);

        $coachprogram->delete();

        Session::flash('success', 'Berhasil Menghapus Jadwal Kelas');

        return redirect()->route('programpivots');
    }
}
