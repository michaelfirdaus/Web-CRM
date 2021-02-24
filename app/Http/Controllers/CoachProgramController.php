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
use DataTables;
use Auth;

class CoachProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Get all programs
        $programs = Program::with('coachprograms', 'branch', 'programname', 'programcategory', 'coaches')->get();

        //DataTables server-side rendering
        if($request->ajax()){
            return DataTables::of($programs)
                ->editColumn('date', function($programs){
                    return "<div class='text-center'>".$programs->date."</div>";
                })
                ->editColumn('branch.name', function($programs){
                    return "<div class='text-center'>".$programs->branch->name."</div>";
                })
                ->editColumn('created_by', function($programs){
                    return "<div class='text-center>".$programs->created_by."</div>";
                })
                ->editColumn('edited_by', function($programs){
                    return "<div class='text-center'>".$programs->edited_by."</div>";
                })
                ->addColumn('Status Coach', function($programs){
                    if($programs->coaches->count() == 0){
                        return 
                        "<div class='text-center text-bold text-danger'>
                            Belum Ada Coach!
                        </div>";
                    }else{
                        return 
                        "<div class='text-center text-success'>
                            Coach Sudah Dipilih
                        </div>";
                    }
                })
                ->addColumn('Detail', function($programs){
                    return
                        "<div class='text-center'>
                            <a href='".route('coachprogram.detail', ['id'=> $programs->id])."' class='btn btn-xs btn-success'>
                                <span class='far fa-eye'></span>
                            </a>
                        </div>";
                })
                ->addColumn('Edit', function($programs){
                    return
                    "<div class='text-center'>
                        <a href='".route('coachprogram.edit', ['id'=> $programs->id])."' class='btn btn-xs btn-info'>
                            <span class='fas fa-pencil-alt'></span>
                        </a>
                    </div>";
                })
                ->rawColumns(['date', 'branch.name', 'created_by', 'edited_by', 'Status Coach', 'Detail', 'Edit'])
                ->make();
        }

        //Redirecting user to coachprogram index view
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
        //Get all programs
        $programs = Program::all();
        //Get all coaches where the status is active
        $coaches = Coach::where('status',1)->get();
        //Get all branches where the status is active
        $branches = Branch::where('status', 1)->get();

        //Checks if program and coach are available
        if($programs->count() == 0 || $coaches->count() == 0){
            Session::flash('info', 'Tidak Dapat Menambahkan Jadwal Kelas karena Program/Coach Tidak Tersedia');
            return redirect()->back();
        }

        //Redirecting user to coachprogram create view
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
        //Input validation
        $rules = [
            'program' => 'required',
            'coach'   => 'required',
        ];

        //Custom validation message
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

        //Notify user with pop up message
        Session::flash('success', 'Berhasil Menambahkan Jadwal Kelas');

        //Redirecting user to coachprograms route
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
        //Get all programs
        $programs = Program::all();
        //Get program by id
        $program = Program::where('id',$id)->with('coachprograms', 'branch')->first();
        //Get all coaches
        $coaches = Coach::where('status', 1)->get();
        //Get all branches
        $branches = Branch::all();

        if($coaches->count() == 0){
            Session::flash('warning', 'Belum Ada Coach yang Terdaftar/Aktif!');
            return redirect()->back();
        }

        //Return coachprogram edit view
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
        //Get program by id
        $program = Program::find($id);
    
        //Input validation
        $rules = [
            'coach'   => 'required',
            'branch'  => 'required',
            'date'    => 'required'
        ];

        //Custom validation message
        $customMessages = [
            'coach.required'           => 'Nama Coach harus diisi.',
            'branch.required'          => 'Lokasi Kelas harus dipilih.',
            'date.required'            => 'Tanggal Batch harus diisi.'
        ];

        $this->validate($request, $rules, $customMessages);

        $program->date = $request->date;
        $program->lastedited_by = Auth::user()->name;
        $program->branch_id = $request->branch;
        //Save current program
        $program->save();

        $program->coaches()->sync($request->coach);

        //Notify user with pop pup message
        Session::flash('success', 'Berhasil Memperbaharui Jadwal Kelas');

        //Redirecting user to coachprogram route
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
        //Find coachprogram
        $coachprogram = CoachProgram::find($id);
        //Delete coachprogram
        $coachprogram->delete();
        //Notify user with pop up message
        Session::flash('success', 'Berhasil Menghapus Jadwal Kelas');

        //Redirecting user to coachprograms route
        return redirect()->route('coachprograms');
    }

    public function detail($id){
        //Find program by id
        $program = Program::where('id',$id)->with('branch', 'coaches')->first();
        
        //Find transaction by program_id
        $transactions = Transaction::where('program_id', $id)->with('participant','result')->get();
 

        $countparticipant = $transactions->count();
        //Check if participant exists
        if($countparticipant == 0){
            Session::flash('warning', 'Belum Ada Peserta Di Kelas Ini!');
            return redirect()->back();
        }

        //Redirecting user to coachprogram detail view
        return view('coachprogram.detail')
               ->with('program', $program)
               ->with('transactions', $transactions)
               ->with('countparticipant', $countparticipant);
    }

}
