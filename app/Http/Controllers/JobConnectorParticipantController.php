<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Participant;
use App\Jobconnector;
use App\JobconnectorParticipant;
use DB;
use Session;

class JobConnectorParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobconnectorparticipants = JobconnectorParticipant::with('participant', 'jobconnector')->get();
        $participants = Participant::with('jobconnectors')->get();
        // dd( $jobconnectorparticipants);
        return view('jobconnectorparticipant.index')
        ->with('jobconnectorparticipants', $jobconnectorparticipants)
        ->with('participants', $participants);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $participants = Participant::all();
        $jobconnectors = Jobconnector::all();

        if($participants->count() == 0 || $jobconnectors->count() == 0 ){
            Session::flash('info', 'Tidak Dapat Menambahkan Job Connector karena Peserta/Perusahaan Tidak Tersedia');
            return redirect()->back();
        }

        return view('jobconnectorparticipant.create')
              ->with('participants', $participants)
              ->with('jobconnectors', $jobconnectors);
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
            'participant'        => 'required',
            'jobconnector'       => 'required',
            'date'               => 'required',
            'application_status' => 'required',
        ]);

        DB::table('jobconnector_participant')->insert([
            'participant_id'        => $request->participant,
            'jobconnector_id'       => $request->jobconnector,
            'date'                  => $request->date,
            'application_status'    => $request->application_status,
        ]);

        Session::flash('success', 'Berhasil Menambahkan Job Connector Baru');

        return redirect()->route('jobconnectorparticipants');
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
        $jobconnectorparticipant = JobconnectorParticipant::find($id);
        $currentparticipant = Participant::find($jobconnectorparticipant->participant_id);
        $participants = Participant::all();
        $jobconnectors = Jobconnector::all();

        return view('jobconnectorparticipant.edit')
            ->with('jobconnectorparticipant', $jobconnectorparticipant)
            ->with('currentparticipant', $currentparticipant)
            ->with('participants', $participants)
            ->with('jobconnectors', $jobconnectors);
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
        $jobconnectorparticipant = JobconnectorParticipant::find($id);

        $this->validate($request, [
            'participant'        => 'required',
            'jobconnector'       => 'required',
            'date'               => 'required',
            'application_status' => 'required',
        ]);

        $jobcconnectorparticipant->id                 = $request->id;
        $jobcconnectorparticipant->participant_id     = $request->participant;
        $jobcconnectorparticipant->jobconnector_id    = $request->jobconnector;
        $jobcconnectorparticipant->date               = $request->date;
        $jobcconnectorparticipant->application_status = $request->application_status;

        $jobconnectorparticipant->save();

        Session::flash('success', 'Berhasil Memperbaharui Job Connector');

        return redirect()->route('jobconnectorparticipants');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jobconnectorparticipant = JobconnectorParticipant::find($id);

        $jobconnectorparticipant->delete();

        Session::flash('success', 'Berhasil Menghapus Job Connector');

        return redirect()->route('jobconnectorparticipants');
    }
}
