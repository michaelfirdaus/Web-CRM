<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Program;
use App\Coach;
use App\CoachProgram;
use App\Branch;
use App\Transaction;
use App\Result;
use Session;
use DB;

class CoachProgramController extends Controller
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

        return view('coachprogram.index')
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
        $coaches = Coach::where('status','1')->get();
        $branches = Branch::all();

        if($programs->count() == 0 || $coaches->count() == 0){
            Session::flash('info', 'Tidak Dapat Menambahkan Jadwal Kelas karena Program/Coach Tidak Tersedia');
            return redirect()->back();
        }

        return view('coachprogram.create')
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

        $rules = [
            'program' => 'required',
            'coach'   => 'required',
            'date'    => 'required|date',
        ];

        $customMessages = [
            'program.required'         => 'Nama Program harus diisi.',
            'coach.required'           => 'Nama Coach harus diisi.',
            'date.required'            => 'Tanggal Batch harus diisi.',
            'date.date'                => 'Tanggal Batch harus berupa tanggal.',
        ];

        $this->validate($request, $rules, $customMessages);

        $coachprogram = CoachProgram::create([
            'coach_id'      => $request->coach,
            'program_id'    => $request->program,
            'date'          => $request->date,
        ]);

        Session::flash('success', 'Berhasil Menambahkan Jadwal Kelas');

        return redirect()->route('coachprograms');
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

        return view('coachprogram.edit')
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

        
        $rules = [
            'program' => 'required',
            'coach'   => 'required',
            'date'    => 'required|date',
        ];

        $customMessages = [
            'program.required'         => 'Nama Program harus diisi.',
            'coach.required'           => 'Nama Coach harus diisi.',
            'date.required'            => 'Tanggal Batch harus diisi.',
            'date.date'                => 'Tanggal Batch harus berupa tanggal.',
        ];

        $this->validate($request, $rules, $customMessages);

        $coachprogram->id           = $request->id;
        $coachprogram->coach_id     = $request->coach;
        $coachprogram->program_id   = $request->program;
        $coachprogram->date         = $request->date;

        $coachprogram->save();

        $program = Program::find($coachprogram->program_id);

        $program->branch_id = $request->branch;

        $program->save();

        Session::flash('success', 'Berhasil Memperbaharui Jadwal Kelas');

        return redirect()->route('coachprograms');
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

        return redirect()->route('coachprograms');
    }

    public function detail($id){
        $coachprogram = CoachProgram::find($id);


        $transactions = Transaction::find($coachprogram->id);
        if($transactions == null){
            Session::flash('warning', 'Belum Ada Peserta Di Kelas Ini!');
            return redirect()->back();
        }
        
        $transactions = Transaction::find($coachprogram->id)
        ->with('participant','result')->get();
        $countparticipant = $transactions->count();
        $programs = Program::with('coaches','branch')->get();

        return view('coachprogram.detail')
               ->with('coachprogram', $coachprogram)
               ->with('transactions', $transactions)
               ->with('programs', $programs)
               ->with('countparticipant', $countparticipant);
    }

}
