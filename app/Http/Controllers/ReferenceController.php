<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Reference;
use App\Participant;
use Session;

class ReferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //Get references by participant_id
        $references = Reference::where('participant_id', $id)->get();
        //Get current participant
        $currentparticipant = Participant::where('id', $id)->first();
        //Redirecting user to reference index view
        return view('reference.index', ['references'             => $references, 
                                        'currentparticipant'     => $currentparticipant]);
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
        //Redirecting user to reference create view
        return view('reference.create')
            ->with('currentparticipant', $currentparticipant)
            ->witH('participant', $participant);
        
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
            'name'    => 'required',
            'phone'   => 'required|numeric',
        ];
        //Custom validation message
        $customMessages = [
            'name.required'  => 'Nama Referensi harus diisi.',
            'phone.required' => 'Nomor Telepon Referensi harus diisi.',
            'phone.numeric'  => 'Nomor Telepon harus berupa angka.',
        ];

        $this->validate($request, $rules, $customMessages);

        //Create new reference
        $reference = Reference::create([
            'participant_id'    => $request->id,
            'name'              => ucwords($request->name),
            'phone'             => $request->phone,
        ]);

        //Notify user with pop up message
        Session::flash('success', 'Berhasil Menambahkan Referensi');
        
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
    public function edit($id, $participantid)
    {
        //Get reference by id
        $reference = Reference::find($id);
        //Get participant by id
        $participant = Participant::find($participantid);
        //Redirecting user to reference edit view
        return view('reference.edit')
            ->with('reference', $reference)
            ->with('participant', $participant);
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
        //Get reference by id
        $reference = Reference::find($id);
        //Input validation
        $rules = [
            'name'    => 'required',
            'phone'   => 'required|numeric',
        ];
        //Custom validation message
        $customMessages = [
            'name.required'  => 'Nama Referensi harus diisi.',
            'phone.required' => 'Nomor Telepon Referensi harus diisi.',
            'phone.numeric'  => 'Nomor Telepon harus berupa angka.',
        ];

        $this->validate($request, $rules, $customMessages);

        $reference->id      = $request->id;
        $reference->name    = ucwords($request->name); 
        $reference->phone   = $request->phone;
        //Save current reference
        $reference->save();
        //Notify user with pop up message
        Session::flash('success', 'Berhasil Memperbaharui Referensi');
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
        //Get reference by id
        $reference = Reference::find($id);

        //Delete reference
        $reference->delete();

        //Notify user with pop up message
        Session::flash('success', 'Berhasil Menghapus Referensi');

        //Redirecting user back
        return redirect()->back();
    }
}
