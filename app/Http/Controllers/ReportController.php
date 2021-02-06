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

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $programs = Program::with('coachprograms', 'branch', 'programname', 'programcategory');
        
        if($request->ajax()){
            return DataTables::of($programs)
                ->editColumn('date', function($programs){
                    return "<div class='text-center'>".$programs->date."</div>";
                })
                ->editColumn('programcategory.name', function($programs){
                    return "<div class='text-center'>".$programs->programcategory->name."</div>";
                })
                ->editColumn('branch.name', function($programs){
                    return "<div class='text-center'>".$programs->branch->name."</div>";
                })
                ->addColumn('report', function($programs){
                    if($programs->transaction){
                        return
                        "<div class='text-center'>
                            <a href='".route('report.detail', ['id'=> $programs->id])."' class='btn btn-xs btn-success'>
                                <span class='far fa-eye'></span>
                            </a>
                        </div>";
                    }
                    else{
                        return
                        "<div class='text-center text-bold'>Belum Ada Peserta</div>";
                    }
                })
                ->rawColumns(['date', 'programcategory.name', 'branch.name', 'report'])
                ->make();
        }

        return view('report.index')
        ->with('programs', $programs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }

    public function detail($id){
        $program = Program::where('id',$id)->with('branch', 'coaches')->first();
        // dd($program);
        $transactions = Transaction::where('program_id', $id)->with('participant','result')->get();
        // dd($transactions);

        $countparticipant = $transactions->count();
        if($countparticipant == 0){
            Session::flash('warning', 'Belum Ada Peserta Di Kelas Ini!');
            return redirect()->back();
        }

        return view('report.detail')
               ->with('program', $program)
               ->with('transactions', $transactions)
               ->with('countparticipant', $countparticipant);
    }

}
