<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Program;
use App\Interest;
use App\Participant;
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
        $interests = Interest::where('participant_id', $id)->with('participant')->get();
        $currentparticipant = Participant::where('id', $id)->first();
        $programs = Program::with('branch');

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

        $programs = Program::all();

        return view('interest.create')
               ->with('programs', $programs)
               ->with('currentparticipant', $currentparticipant);
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
            'program_id'    => 'required',
        ]);

        $interest = Interest::create([
            'participant_id'    => $request->id,
            'program_id'        => $request->program_id,
        ]);

        Session::flash('success', 'Berhasil Menambahkan Minat Program');

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
        $interest = Interest::find($id);
        $programs = Program::all();
        
        return view('interest.edit')
               ->with('programs', $programs)
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
        $interest = Interest::find($id);

        $this->validate($request, [
            'program_id'    => 'required',
        ]);

        $interest->id         = $request->id;
        $interest->program_id = $request->program_id; 

        $interest->save();

        Session::flash('success', 'Berhasil Memperbaharui Minat Program');

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
        $interest = Interest::find($id);

        $interest->delete();

        Session::flash('success', 'Berhasil Menghapus Minat Program');

        return redirect()->back();
    }
}
