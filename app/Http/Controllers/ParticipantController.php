<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Participant;
use App\Branch;
use App\Know;
use App\Profession;
use Auth;
use App\Membernumber;
use Session;
use DataTables;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Get all participants
        $participants = Participant::with('branch', 'know', 'profession')->get();

        //DataTables server-side rendering
        if($request->ajax()){
            return DataTables::of($participants)
                ->editColumn('pob', function($participants){
                    return "<div class='text-center'>".$participants->pob."</div>";
                })
                ->editColumn('dob', function($participants){
                    return "<div class='text-center'>".$participants->dob."</div>";
                })
                ->editColumn('cv_link', function($participants){
                    return 
                    "<a href='".$participants->cv_link."' target='_blank'>".$participants->cv_link."</a>";
                })
                ->editColumn('sp_link', function($participants){
                    return 
                    "<a href='".$participants->sp_link."' target='_blank'>".$participants->sp_link."</a>";
                })
                ->editColumn('member_validthru', function($participants){
                    return "<div class='text-center'>".$participants->member_validthru."</div>";
                })
                ->editColumn('branch', function($participants){
                    return "<div class='text-center'>".$participants->branch->name."</div>";
                })
                ->editColumn('know', function($participants){
                    if($participants->know_id == 1){
                        return 
                        "<div class='text-center'>".$participants->memberreference_id." - ". $participants->memberreference_name."</div>";
                    }else{
                        return
                        "<div class='text-center'>".$participants->know->name."</div>";
                    }
                })
                ->editColumn('profession', function($participants){
                    if($participants->profession){
                        return
                        "<div class='text-center'>".$participants->profession->name."</div>";
                    }else{
                        return "<div class='text-bold text-danger'>Tidak Ada Data</div>";
                    }
                })
                ->editColumn('professiondetail', function($participants){
                    return "<div class='text-center'>".$participants->profession_detail."</div>";
                })
                ->editColumn('created_by', function($participants){
                    return "<div class='text-center'>".$participants->created_by."</div>";
                })
                ->editColumn('lastedited_by', function($participants){
                    return "<div class='text-center'>".$participants->lastedited_by."</div>";
                })
                ->addColumn('Minat Program', function($participants){
                    return 
                    "<div class='text-center'>
                        <a href='".route('interests', ['id' => $participants ->id])."' class='btn btn-xs btn-success'>
                            <span class='fas fa-tasks'></span>
                        </a>
                    </div>";
                })
                ->addColumn('Referensi', function($participants){
                    return
                    "<div class='text-center'>
                        <a href='".route('references', ['id' => $participants ->id])."' class='btn btn-xs btn-primary'>
                            <span class='fas fa-address-book'></span>
                        </a>
                    </div>";
                })
                ->addColumn('Edit', function($participants){
                    return
                    "<div class='text-center'>
                        <a href='".route('participant.edit', ['id' => $participants ->id])."' class='btn btn-xs btn-info'>
                            <span class='fas fa-pencil-alt'></span>
                        </a>
                    </div>";
                })
                ->rawColumns(['pob', 'dob', 'cv_link', 'sp_link', 'member_validthru', 
                             'branch', 'know', 'profession', 'professiondetail',
                             'Minat Program', 'Referensi', 'Edit', 'created_by', 'lastedited_by'])
                ->make();
        }

        //Redirecting user to participant index view
        return view('participant.index')
            ->with('participants', $participants);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Get all branches where the status is active
        $branches = Branch::where('status', 1)->get();
        //Get all knows where the status is active
        $knows = Know::where('status', 1)->get();
        //Get all professions where the status is active
        $professions = Profession::where('status', 1)->get();
        //Get all participants
        $participants = Participant::all();

        //Check if branch is exists
        if($branches->count() == 0){
            Session::flash('info', 'Tidak Dapat Menambahkan Peserta karena Lokasi Kelas Tidak Tersedia');
            return redirect()->back();
        }
        //Check if knows is exists
        if($knows->count() == 0){
            Session::flash('info', 'Tidak Dapat Menambahkan Peserta karena Tidak Ada Kanal yang Terdaftar');
            return redirect()->back();
        }
        //Check if professions is exists
        if($professions->count() ==0){
            Session::flash('info', 'Tidak Dapat Menambahkan Peserta karena Tidak Ada Profesi yang Terdaftar');
            return redirect()->back();
        }
        //Redirecting user to participant create view
        return view('participant.create')
            ->with('branches', $branches)
            ->with('knows', $knows)
            ->with('participants', $participants)
            ->with('professions', $professions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Input valdiation
        $rules = [
            'branch_id'                 => 'required',
            'know_id'                   => 'required',
            'profession_id'             => 'required',
            'name'                      => 'required',
            'pob'                       => 'required',
            'dob'                       => 'required|date',
            'phonenumber'               => 'required|numeric|regex:/^[0-9]+$/u',
            'address'                   => 'required',
            'email'                     => 'required|email',
            'emergencycontact_name'     => 'required',
            'emergencycontact_phone'    => 'required|numeric|regex:/^[0-9]+$/u'
        ];
        //Custom validation message
        $customMessages = [
            'branch_id.required'                => 'Lokasi Pendaftaran harus dipilih.',
            'know_id.required'                  => 'Mengetahui Michael\'s CRM dari harus diisi.',
            'profession_id.required'            => 'Profesi harus dipilih.',
            'name.required'                     => 'Nama Peserta harus diisi.',
            'pob.required'                      => 'Tempat Lahir harus diisi.',
            'dob.required'                      => 'Tanggal Lahir harus diisi.',
            'dob.date'                          => 'Tanggal Lahir harus berupa tanggal.',
            'phonenumber.required'              => 'Nomor Telepon harus diisi.',
            'phonenumber.numeric'               => 'Nomor Telepon harus berupa angka.',
            'phonenumber.regex'                 => 'Nomor Telepon harus berupa angka.',
            'address.required'                  => 'Alamat harus diisi.',
            'email.required'                    => 'E-mail harus diisi.',
            'email.email'                       => 'Format e-mail tidak sesuai.',
            'emergencycontact_name.required'    => 'Nama Kontak Darurat harus diisi.',
            'emergencycontact_phone.required'   => 'Nomor Kontak Darurat harus diisi.',
            'emergencycontact_phone.numeric'    => 'Nomor Kontak Darurat harus berupa angka.',
            'emergencycontact_phone.regex'    => 'Nomor Kontak Darurat harus berupa angka.'
        ];

        $this->validate($request, $rules, $customMessages);
        //Check if know exists
        if($request->know_id == 1){
            $rule = [
                'memberreference_id' => 'required',
            ];

            $customMessage = [
                'memberreference_id.required' => 'Data Alumni harus dipilih.'
            ];

            $this->validate($request, $rule, $customMessage);
        }
        
        //Get all participants
        $checkParticipant = Participant::all();

        //Check if participants exists and if user select know CRM from alumni
        if($checkParticipant->count() > 0 && $request->has('memberreference_id')){
            $p = Participant::where('id',$request->memberreference_id)->first();
            
            $branch_code = Branch::find($request->branch_id);
            $membernum = Membernumber::where('branch_id', $request->branch_id)->first();
    
            if($membernum == null){
                $membernum = Membernumber::create([
                    'branch_id'     => $request->branch_id,
                    'lastnumber'    => (int)$branch_code->code * 1000000  + 501,
                ]);
            }else{
                $membernum->update([
                    'lastnumber' => (int)$membernum->lastnumber + 1,
                ]);
    
                $membernum->save();
            }

            //Create participant
            $participant = Participant::create([
                'id'                        => $membernum->lastnumber,
                'branch_id'                 => $request->branch_id,
                'know_id'                   => $request->know_id,
                'profession_id'             => $request->profession_id,
                'profession_detail'         => ucfirst($request->profession_detail),
                'name'                      => ucwords($request->name),
                'pob'                       => ucwords($request->pob),
                'dob'                       => $request->dob,
                'phonenumber'               => $request->phonenumber,
                'address'                   => ucwords($request->address),
                'email'                     => $request->email,
                'student_idcard'            => $request->student_idcard,
                'cv_link'                   => $request->cv_link,
                'sp_link'                   => $request->sp_link,
                'member_validthru'          => $request->member_validthru,
                'emergencycontact_name'     => ucwords($request->emergencycontact_name),
                'emergencycontact_phone'    => $request->emergencycontact_phone,
                'memberreference_id'        => $request->memberreference_id,
                'memberreference_name'      => ucwords($p->name),
                'created_by'                => Auth::user()->name,
            ]);
        }else{
            $branch_code = Branch::find($request->branch_id);
            $membernum = Membernumber::where('branch_id', $request->branch_id)->first();
            //Check if member number exists
            if($membernum == null){
                $membernum = Membernumber::create([
                    'branch_id'     => $request->branch_id,
                    'lastnumber'    => (int)$branch_code->code * 1000000  + 501,
                ]);
            }else{
                $membernum->update([
                    'lastnumber' => (int)$membernum->lastnumber + 1,
                ]);
    
                $membernum->save();
            }

            $participant = Participant::create([
                'id'                        => $membernum->lastnumber,
                'branch_id'                 => $request->branch_id,
                'know_id'                   => $request->know_id,
                'profession_id'             => $request->profession_id,
                'profession_detail'         => ucfirst($request->profession_detail),
                'name'                      => ucwords($request->name),
                'pob'                       => ucwords($request->pob),
                'dob'                       => $request->dob,
                'phonenumber'               => $request->phonenumber,
                'address'                   => ucwords($request->address),
                'email'                     => $request->email,
                'student_idcard'            => $request->student_idcard,
                'cv_link'                   => $request->cv_link,
                'sp_link'                   => $request->sp_link,
                'member_validthru'          => $request->member_validthru,
                'emergencycontact_name'     => ucwords($request->emergencycontact_name),
                'emergencycontact_phone'    => $request->emergencycontact_phone,
                'created_by'                => Auth::user()->name,
            ]);
        }

        //Notify user with pop up message
        Session::flash('success', 'Berhasil Menambahkan Peserta');

        //Redirecting user to participants route
        return redirect()->route('participants');
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
        //Get participant by id
        $participant = Participant::find($id);
        //Get all participants
        $allparticipant = Participant::all();
        //Get all branches
        $branches = Branch::all();
        //Get all knows
        $knows = Know::all();
        //Get all professions
        $professions = Profession::all();

        //Redirecting user to participant edit controller
        return view('participant.edit')
            ->with('branches', $branches)
            ->with('knows', $knows)
            ->with('participant', $participant)
            ->with('allparticipant', $allparticipant)
            ->with('professions', $professions);
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
        //Get participant by id
        $participant = Participant::find($id);
        //Input validation
        $rules = [
            'branch_id'                 => 'required',
            'know_id'                   => 'required',
            'profession_id'             => 'required',
            'name'                      => 'required',
            'pob'                       => 'required',
            'dob'                       => 'required|date',
            'phonenumber'               => 'required|numeric|regex:/^[0-9]+$/u',
            'address'                   => 'required',
            'email'                     => 'required|email',
            'emergencycontact_name'     => 'required',
            'emergencycontact_phone'    => 'required|numeric|regex:/^[0-9]+$/u'
        ];
        //Custom validation message
        $customMessages =  [
            'branch_id.required'                => 'Lokasi Pendaftaran harus dipilih.',
            'know_id.required'                  => 'Mengetahui Michael\'s CRM dari harus diisi.',
            'profession_id.required'            => 'Profesi harus dipilih.',
            'name.required'                     => 'Nama Peserta harus diisi.',
            'pob.required'                      => 'Tempat Lahir harus diisi.',
            'dob.required'                      => 'Tanggal Lahir harus diisi.',
            'dob.date'                          => 'Tanggal Lahir harus berupa tanggal.',
            'phonenumber.required'              => 'Nomor Telepon harus diisi.',
            'phonenumber.numeric'               => 'Nomor Telepon harus berupa angka.',
            'phonenumber.regex'                 => 'Nomor Telepon harus berupa angka.',
            'address.required'                  => 'Alamat harus diisi.',
            'email.required'                    => 'E-mail harus diisi.',
            'email.email'                       => 'Format e-mail tidak sesuai.',
            'emergencycontact_name.required'    => 'Nama Kontak Darurat harus diisi.',
            'emergencycontact_phone.required'   => 'Nomor Kontak Darurat harus diisi.',
            'emergencycontact_phone.numeric'    => 'Nomor Kontak Darurat harus berupa angka.',
            'emergencycontact_phone.regex'      => 'Nomor Kontak Darurat harus berupa angka.'
        ];

        $this->validate($request, $rules, $customMessages);

        //Check if user select know CRM from alumni
        if($request->know_id == 1){
            $rule = [
                'memberreference_id' => 'required',
            ];

            $customMessage = [
                'memberreference_id.required' => 'Data Alumni harus dipilih.'
            ];

            $this->validate($request, $rule, $customMessage);
    
            $p = Participant::find($request->memberreference_id);
            
            $participant->branch_id                 = $request->branch_id;
            $participant->know_id                   = $request->know_id;
            $participant->profession_id             = $request->profession_id;
            $participant->profession_detail         = ucfirst($request->profession_detail);
            $participant->name                      = ucwords($request->name);
            $participant->pob                       = ucwords($request->pob);
            $participant->dob                       = $request->dob;
            $participant->phonenumber               = $request->phonenumber;
            $participant->address                   = ucwords($request->address);
            $participant->email                     = $request->email;
            $participant->student_idcard            = $request->student_idcard;
            $participant->cv_link                   = $request->cv_link;
            $participant->sp_link                   = $request->sp_link;
            $participant->member_validthru          = $request->member_validthru;
            $participant->emergencycontact_name     = ucwords($request->emergencycontact_name);
            $participant->emergencycontact_phone    = $request->emergencycontact_phone;
            $participant->memberreference_id        = $request->memberreference_id;
            $participant->memberreference_name      = ucwords($p->name);
            $participant->lastedited_by             = Auth::user()->name;
        }else{
            $participant->branch_id                 = $request->branch_id;
            $participant->know_id                   = $request->know_id;
            $participant->profession_id             = $request->profession_id;
            $participant->profession_detail         = ucfirst($request->profession_detail);
            $participant->name                      = ucwords($request->name);
            $participant->pob                       = ucwords($request->pob);
            $participant->dob                       = $request->dob;
            $participant->phonenumber               = $request->phonenumber;
            $participant->address                   = ucwords($request->address);
            $participant->email                     = $request->email;
            $participant->student_idcard            = $request->student_idcard;
            $participant->cv_link                   = $request->cv_link;
            $participant->sp_link                   = $request->sp_link;
            $participant->member_validthru          = $request->member_validthru;
            $participant->emergencycontact_name     = ucwords($request->emergencycontact_name);
            $participant->emergencycontact_phone    = $request->emergencycontact_phone;
            $participant->lastedited_by             = Auth::user()->name;
        }

        //Save current participant
        $participant->save();
        //Notify user with pop up message
        Session::flash('success', 'Berhasil Memperbaharui Peserta');
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
        //Get participant by id
        $participant = Participant::find($id);
        //Delete participant
        $participant->delete();
        //Notify user with pop up message
        Session::flash('success', 'Berhasil Menghapus Peserta');
        //Redirecting user to participants route
        return redirect()->route('participants');
    }

    public function fetchknow(Request $request){
        $a = Know::find($request->id);
        return response()->json($a->name);
    }

    public function fetchbranch(Request $request){
        $a = Branch::find($request->id);
        return response()->json($a->name);
    }

    public function fetchprofession(Request $request){
        $a = Profession::find($request->id);
        return response()->json($a->name);
    }

}
