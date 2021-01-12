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
        $programs = Program::with('coachprograms', 'branch')->get();

        return view('coachprogram.index')
        ->with('programs', $programs);
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
        ];

        $customMessages = [
            'program.required'         => 'Nama Program harus diisi.',
            'coach.required'           => 'Nama Coach harus diisi.',
        ];

        $this->validate($request, $rules, $customMessages);

        foreach($request->coach as $coachprogram){
            CoachProgram::create([
                'coach_id'      => $coachprogram,
                'program_id'    => $request->program,
            ]);
        }

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
        $programs = Program::all();
        $program = Program::where('id',$id)->with('coachprograms', 'branch')->first();
        $coaches = Coach::all();
        $branches = Branch::all();

        return view('coachprogram.edit')
            ->with('programs', $programs)
            ->with('program', $program)
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
        $program = Program::find($id);
    
        $rules = [
            'coach'   => 'required',
            'branch'  => 'required',
            'date'    => 'required'
        ];

        $customMessages = [
            'coach.required'           => 'Nama Coach harus diisi.',
            'branch.required'          => 'Lokasi Kelas harus dipilih.',
            'date.required'            => 'Tanggal Batch harus diisi.'
        ];

        $this->validate($request, $rules, $customMessages);

        $program->date = $request->date;
        $program->branch_id = $request->branch;
        $program->save();

        $program->coaches()->sync($request->coach);

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
