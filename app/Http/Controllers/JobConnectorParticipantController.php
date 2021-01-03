<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Participant;
use App\Jobconnector;
use App\JobconnectorParticipant;
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
        $jcps = JobconnectorParticipant::with('jobconnector', 'participant')->get();

        return view('jobconnectorparticipant.index')->with('jcps', $jcps);
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

        $jcp = JobconnectorParticipant::create([
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
        $jcp = JobconnectorParticipant::find($id);
        $currentparticipant = Participant::find($jcp->id);
        $participants = Participant::all();
        $jobconnectors = Jobconnector::all();

        return view('jobconnectorparticipant.edit')
            ->with('jobconnectorparticipant', $jcp)
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
        $jcp = JobconnectorParticipant::find($id);

        $this->validate($request, [
            'participant'        => 'required',
            'jobconnector'       => 'required',
            'date'               => 'required',
            'application_status' => 'required',
        ]);

        $jcp = JpbconnectorParticipant::create([
            'participant_id'        => $request->participant,
            'jobconnector_id'       => $request->jobconnector,
            'date'                  => $request->date,
            'application_status'    => $request->application_status,
        ]);

        $jcp->id                 = $request->id;
        $jcp->participant_id     = $request->participant;
        $jcp->jobconnector       = $request->jobconnector;
        $jcp->date               = $request->date;
        $jcp->application_status = $request->application_status;

        $jcp->save();

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
        $jcp = JobconnectorParticipant::find($id);

        $jcp->delete();

        Session::flash('success', 'Berhasil Menghapus Job Connector');

        return redirect()->route('jobconnectorparticipants');
    }
}
