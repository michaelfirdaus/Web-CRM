<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Participant;
use App\Branch;
use App\Knowcn;
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
        $participants = Participant::with('branch', 'knowcn', 'profession')->get();

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
                ->editColumn('knowcn', function($participants){
                    if($participants->knowcn_id == 1){
                        return 
                        "<div class='text-center'>".$participants->memberreference_id." - ". $participants->memberreference_name."</div>";
                    }else{
                        return
                        "<div class='text-center'>".$participants->knowcn->name."</div>";
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
                             'branch', 'knowcn', 'profession', 'professiondetail',
                             'Minat Program', 'Referensi', 'Edit', 'created_by', 'lastedited_by'])
                ->make();
        }

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
        $branches = Branch::where('status', 1)->get();
        $knowcns = Knowcn::where('status', 1)->get();
        $professions = Profession::where('status', 1)->get();
        $participants = Participant::all();

        if($branches->count() == 0){
            Session::flash('info', 'Tidak Dapat Menambahkan Peserta karena Lokasi Kelas Tidak Tersedia');
            return redirect()->back();
        }

        if($knowcns->count() == 0){
            Session::flash('info', 'Tidak Dapat Menambahkan Peserta karena Tidak Ada Kanal Course-Net yang Terdaftar');
            return redirect()->back();
        }

        if($professions->count() ==0){
            Session::flash('info', 'Tidak Dapat Menambahkan Peserta karena Tidak Ada Profesi yang Terdaftar');
            return redirect()->back();
        }

        return view('participant.create')
            ->with('branches', $branches)
            ->with('knowcns', $knowcns)
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

        $rules = [
            'branch_id'                 => 'required',
            'knowcn_id'                 => 'required',
            'profession_id'             => 'required',
            'name'                      => 'required',
            'pob'                       => 'required',
            'dob'                       => 'required|date',
            'phonenumber'               => 'required|numeric',
            'address'                   => 'required',
            'email'                     => 'required|email',
            'emergencycontact_name'     => 'required',
            'emergencycontact_phone'    => 'required|numeric'
        ];

        $customMessages = [
            'branch_id.required'                => 'Lokasi Pendaftaran harus dipilih.',
            'knowcn_id.required'                => 'Mengetahui Course-Net dari harus diisi.',
            'profession_id.required'            => 'Profesi harus dipilih.',
            'name.required'                     => 'Nama Peserta harus diisi.',
            'pob.required'                      => 'Tempat Lahir harus diisi.',
            'dob.required'                      => 'Tanggal Lahir harus diisi.',
            'dob.date'                          => 'Tanggal Lahir harus berupa tanggal.',
            'phonenumber.required'              => 'Nomor Telepon harus diisi.',
            'phonenumber.numeric'               => 'Nomor Telepon harus berupa angka.',
            'address.required'                  => 'Alamat harus diisi.',
            'email.required'                    => 'E-mail harus diisi.',
            'email.email'                       => 'Format e-mail tidak sesuai.',
            'emergencycontact_name.required'    => 'Nama Kontak Darurat harus diisi.',
            'emergencycontact_phone.required'   => 'Nomor Kontak Darurat harus diisi.',
            'emergencycontact_phone.numeric'    => 'Nomor Kontak Darurat harus berupa angka.'
        ];

        $this->validate($request, $rules, $customMessages);

        if($request->knowcn_id == 1){
            $rule = [
                'memberreference_id' => 'required',
            ];

            $customMessage = [
                'memberreference_id.required' => 'Data Alumni harus dipilih.'
            ];

            $this->validate($request, $rule, $customMessage);
        }
        
        $checkParticipant = Participant::all();

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

            $participant = Participant::create([
                'id'                        => $membernum->lastnumber,
                'branch_id'                 => $request->branch_id,
                'knowcn_id'                 => $request->knowcn_id,
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
                'knowcn_id'                 => $request->knowcn_id,
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

        Session::flash('success', 'Berhasil Menambahkan Peserta');

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
        $participant = Participant::find($id);
        $allparticipant = Participant::all();
        $branches = Branch::all();
        $knowcns = Knowcn::all();
        $professions = Profession::all();

        return view('participant.edit')
            ->with('branches', $branches)
            ->with('knowcns', $knowcns)
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
        $participant = Participant::find($id);

        $rules = [
            'branch_id'                 => 'required',
            'knowcn_id'                 => 'required',
            'profession_id'             => 'required',
            'name'                      => 'required',
            'pob'                       => 'required',
            'dob'                       => 'required|date',
            'phonenumber'               => 'required|numeric',
            'address'                   => 'required',
            'email'                     => 'required|email',
            'emergencycontact_name'     => 'required',
            'emergencycontact_phone'    => 'required|numeric'
        ];

        $customMessages = [
            'branch_id.required'                => 'Lokasi Pendaftaran harus dipilih.',
            'knowcn_id.required'                => 'Mengetahui Course-Net dari harus diisi.',
            'profession_id.required'            => 'Profesi harus dipilih.',
            'name.required'                     => 'Nama Peserta harus diisi.',
            'pob.required'                      => 'Tempat Lahir harus diisi.',
            'dob.required'                      => 'Tanggal Lahir harus diisi.',
            'dob.date'                          => 'Tanggal Lahir harus berupa tanggal.',
            'phonenumber.required'              => 'Nomor Telepon harus diisi.',
            'phonenumber.numeric'               => 'Nomor Telepon harus berupa angka.',
            'address.required'                  => 'Alamat harus diisi.',
            'email.required'                    => 'E-mail harus diisi.',
            'email.email'                       => 'Format e-mail tidak sesuai.',
            'emergencycontact_name.required'    => 'Nama Kontak Darurat harus diisi.',
            'emergencycontact_phone.required'   => 'Nomor Kontak Darurat harus diisi.',
            'emergencycontact_phone.numeric'    => 'Nomor Kontak Darurat harus berupa angka.'
        ];

        $this->validate($request, $rules, $customMessages);

        if($request->knowcn_id == 1){
            $rule = [
                'memberreference_id' => 'required',
            ];

            $customMessage = [
                'memberreference_id.required' => 'Data Alumni harus dipilih.'
            ];

            $this->validate($request, $rule, $customMessage);
    
            $p = Participant::find($request->memberreference_id);
            
            $participant->branch_id                 = $request->branch_id;
            $participant->knowcn_id                 = $request->knowcn_id;
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
            $participant->knowcn_id                 = $request->knowcn_id;
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


        $participant->save();

        Session::flash('success', 'Berhasil Memperbaharui Peserta');

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
        $participant = Participant::find($id);

        $participant->delete();

        Session::flash('success', 'Berhasil Menghapus Peserta');

        return redirect()->route('participants');
    }

    public function fetchknowcn(Request $request){
        $a = Knowcn::find($request->id);
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
