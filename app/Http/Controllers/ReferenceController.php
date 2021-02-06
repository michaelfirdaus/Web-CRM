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
        $references = Reference::where('participant_id', $id)->get();
        $currentparticipant = Participant::where('id', $id)->first();
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
        $participant = Participant::find($id);
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

        $rules = [
            'name'    => 'required',
            'phone'   => 'required|numeric',
        ];

        $customMessages = [
            'name.required'  => 'Nama Referensi harus diisi.',
            'phone.required' => 'Nomor Telepon Referensi harus diisi.',
            'phone.numeric'  => 'Nomor Telepon harus berupa angka.',
        ];

        $this->validate($request, $rules, $customMessages);

        $reference = Reference::create([
            'participant_id'    => $request->id,
            'name'              => ucwords($request->name),
            'phone'             => $request->phone,
        ]);

        Session::flash('success', 'Berhasil Menambahkan Referensi');

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
        $reference = Reference::find($id);

        $participant = Participant::find($participantid);
        
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
        $reference = Reference::find($id);

        $rules = [
            'name'    => 'required',
            'phone'   => 'required|numeric',
        ];

        $customMessages = [
            'name.required'  => 'Nama Referensi harus diisi.',
            'phone.required' => 'Nomor Telepon Referensi harus diisi.',
            'phone.numeric'  => 'Nomor Telepon harus berupa angka.',
        ];

        $this->validate($request, $rules, $customMessages);

        $reference->id      = $request->id;
        $reference->name    = ucwords($request->name); 
        $reference->phone   = $request->phone;

        $reference->save();

        Session::flash('success', 'Berhasil Memperbaharui Referensi');

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
        $reference = Reference::find($id);

        $reference->delete();

        Session::flash('success', 'Berhasil Menghapus Referensi');

        return redirect()->back();
    }
}
