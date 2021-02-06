<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Participant;
use App\Jobconnector;
use App\JobconnectorParticipant;
use Session;
use DataTables;
use Auth;

class JobConnectorParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $jobconnectorparticipants = JobconnectorParticipant::with('participant', 'jobconnector');

        if($request->ajax()){
            return DataTables::of($jobconnectorparticipants)
                ->editColumn('participant_id', function($jobconnectorparticipants){
                    return "<div class='text-center'>".$jobconnectorparticipants->participant_id."</div>";
                })
                ->editColumn('participantname', function($jobconnectorparticipants){
                    return "<div class='text-center'>".$jobconnectorparticipants->participant->name."</div>";
                })
                ->editColumn('participantcv_link', function($jobconnectorparticipants){
                    return "<a href='".$jobconnectorparticipants->participant->cv_link."' target='_blank'>".$jobconnectorparticipants->participant->cv_link."</a>";
                })
                ->editColumn('companyname', function($jobconnectorparticipants){
                    return "<div class='text-center'>".$jobconnectorparticipants->jobconnector->name."</div>";
                })
                ->editColumn('date', function($jobconnectorparticipants){
                    return "<div class='text-center'>".$jobconnectorparticipants->date."</div>";
                })
                ->editColumn('application_status', function($jobconnectorparticipants){
                    if($jobconnectorparticipants->application_status == 1){
                        return "<div class='text-center'>Sedang Dalam Proses</div>";
                    }elseif( $jobconnectorparticipants->application_status == 2 ){
                        return "<div class='text-center'>Ditolak</div>";
                    }elseif( $jobconnectorparticipants->application_status == 3 ){
                        return "<div class='text-center'>Diterima</div>";
                    }elseif( $jobconnectorparticipants->application_status == 4 ){
                        return "<div class='text-center'>Dibatalkan</div>";
                    }else{
                        return "<div class='text-center'>Lainnya</div>";
                    }
                })
                ->editColumn('created_by', function($jobconnectorparticipants){
                    return "<div class='text-center'>".$jobconnectorparticipants->created_by."</div>";
                })
                ->editColumn('lastedited_by', function($jobconnectorparticipants){
                    return "<div class='text-center'>".$jobconnectorparticipants->lastedited_by."</div>";
                })
                ->addColumn('Edit', function($jobconnectorparticipants){
                    return
                    "<div class='text-center'>
                        <a href='".route('jobconnectorparticipant.edit', ['id' => $jobconnectorparticipants->id])."' class='btn btn-xs btn-info'>
                            <span class='fas fa-pencil-alt'></span>
                        </a>
                    </div>";
                })
                ->addColumn('Hapus', function($jobconnectorparticipants){
                    return
                    "<div class='text-center'>
                        <a href='' class='btn btn-xs btn-danger' data-toggle='modal' data-target='#modal-default'>
                            <span class='fas fa-trash-alt'></span>
                        </a>
                    </div>
                    <div class='modal fade' id='modal-default'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                            <div class='modal-header'>
                                <h4 class='modal-title'>Konfirmasi</h4>
                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>
                            <div class='modal-body'>
                                <p>Yakin Untuk Menghapus Item Ini?</p>
                                <p class='text-bold'>PERINGATAN! Data yang Sudah Dihapus Tidak Dapat Dikembalikan</p>
                            </div>
                            <div class='modal-footer justify-content-between'>
                                <button type='button' class='btn btn-success' data-dismiss='modal'>
                                    <span class='fas fa-times mr-1'></span>
                                Batalkan
                                </button>
                                <a href='".route('jobconnectorparticipant.delete', ['id' => $jobconnectorparticipants->id])."' class='btn btn btn-danger'>
                                <span class='fas fa-check mr-1'></span>
                                Hapus
                                </a>
                            </div>
                            </div>
                        </div>
                    </div>";
                })
                ->rawColumns(['participant_id', 'participantname', 'participantcv_link', 'companyname', 'date', 'application_status', 'created_by', 'lastedited_by', 'Edit', 'Hapus'])
                ->make();
            }

        return view('jobconnectorparticipant.index')
        ->with('jobconnectorparticipants', $jobconnectorparticipants);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $participants = Participant::all();
        $jobconnectors = Jobconnector::where('status', 1)->get();

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

        $rules = [
            'participant'        => 'required',
            'jobconnector'       => 'required',
            'date'               => 'required|date',
            'application_status' => 'required',
        ];

        $customMessages = [
            'participant.required'        => 'Nama Peserta harus dipilih.',
            'jobconnector.required'       => 'Perusahaan Rekanan harus diisi.',
            'date.required'               => 'Tanggal Apply harus diisi.',
            'date.date'                   => 'Tanggal Apply harus berupa tanggal.',
            'application_status.required' => 'Status harus dipilih.'
        ];

        $this->validate($request, $rules, $customMessages);

        $jcp = JobconnectorParticipant::create([
            'participant_id'        => $request->participant,
            'jobconnector_id'       => $request->jobconnector,
            'date'                  => $request->date,
            'application_status'    => $request->application_status,
            'created_by'            => Auth::user()->name,
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

        $rules = [
            'participant'        => 'required',
            'jobconnector'       => 'required',
            'date'               => 'required|date',
            'application_status' => 'required',
        ];

        $customMessages = [
            'participant.required'        => 'Nama Peserta harus dipilih.',
            'jobconnector.required'       => 'Perusahaan Rekanan harus diisi.',
            'date.required'               => 'Tanggal Apply harus diisi.',
            'date.date'                   => 'Tanggal Apply harus berupa tanggal.',
            'application_status.required' => 'Status harus dipilih.'
        ];

        $this->validate($request, $rules, $customMessages);

        $jobconnectorparticipant->id                 = $request->id;
        $jobconnectorparticipant->participant_id     = $request->participant;
        $jobconnectorparticipant->jobconnector_id    = $request->jobconnector;
        $jobconnectorparticipant->date               = $request->date;
        $jobconnectorparticipant->application_status = $request->application_status;
        $jobconnectorparticipant->lastedited_by      = Auth::user()->name;

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
