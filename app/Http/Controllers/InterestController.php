<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Program;
use App\Interest;
use App\Participant;
use App\Programname;
use Session;

class InterestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //Get all interests by participant_id
        $interests = Interest::where('participant_id', $id)->with('participant')->get();
        //Get current participant
        $currentparticipant = Participant::where('id', $id)->first();
        //Get all programs
        $programs = Program::with('branch');

        //Redirecting user to interest index view
        return view('interest.index',   ['interests'         => $interests, 
                                        'programs'           => $programs,
                                        'currentparticipant' => $currentparticipant]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $currentparticipant = $id;
        //Get participant by id
        $participant = Participant::find($id);
        //Get all programnames
        $programnames = Programname::all();

        //Return interest create view
        return view('interest.create')
               ->with('programnames', $programnames)
               ->with('currentparticipant', $currentparticipant)
               ->with('participant', $participant);
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
            'program_id' => 'required',
        ];
        //Custom validation message
        $customMessages = [
            'program_id.required' => 'Minat Program harus diisi.',
        ];

        $this->validate($request, $rules, $customMessages);
        //Create interest
        $interest = Interest::create([
            'participant_id'    => $request->id,
            'programname_id'    => $request->program_id,
        ]);
        
        //Notify user with pop up message
        Session::flash('success', 'Berhasil Menambahkan Minat Program');

        //Redirecting user back
        return redirect()->back();
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
        //Get interest by id
        $interest = Interest::find($id);
        //Get all programnames
        $programnames = Programname::all();
        
        //Redirecting user to interest edit view
        return view('interest.edit')
               ->with('programnames', $programnames)
               ->with('interest', $interest);
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
        //Get interest by id
        $interest = Interest::find($id);

        //Input validation
        $rules = [
            'program_id' => 'required',
        ];
        //Custom validation message
        $customMessages = [
            'program_id.required' => 'Minat Program harus diisi.',
        ];

        $this->validate($request, $rules, $customMessages);

        $interest->id             = $request->id;
        $interest->programname_id = $request->program_id; 
        //Save current interest
        $interest->save();
        //Notify user with pop up message
        Session::flash('success', 'Berhasil Memperbaharui Minat Program');

        //Redirecting user to participants route
        return redirect()->route('participants');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Get interest by id
        $interest = Interest::find($id);
        //Delete interest
        $interest->delete();
        //Notify user with pop up message
        Session::flash('success', 'Berhasil Menghapus Minat Program');
        //Redirecting user back
        return redirect()->back();
    }
}
