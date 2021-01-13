<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Participant;
use App\Branch;
use App\Knowcn;
use App\Profession;
use App\Membernumber;
use Session;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $participants = Participant::with('branch', 'knowcn', 'profession')->get();

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
        $branches = Branch::all();
        $knowcns = Knowcn::where('status','1')->get();
        $professions = Profession::where('status','1')->get();
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

        // foreach($request->program as $program){
        //     DB::table('participants')->insert([
        //         'coach_id'      => $coach,
        //         'program_id'    => $request->program,
        //         'date'          => $request->date,
        //     ]);
        // }
        
        $checkParticipant = Participant::all();

        if($checkParticipant->count() > 0 && $request->has('memberreference_id')){
            $p = Participant::where('id',$request->memberreference_id)->get();
            
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
                'name'                      => $request->name,
                'pob'                       => $request->pob,
                'dob'                       => $request->dob,
                'phonenumber'               => $request->phonenumber,
                'address'                   => $request->address,
                'email'                     => $request->email,
                'cv_link'                   => $request->cv_link,
                'sp_link'                   => $request->sp_link,
                'member_validthru'          => $request->member_validthru,
                'emergencycontact_name'     => $request->emergencycontact_name,
                'emergencycontact_phone'    => $request->emergencycontact_phone,
                'memberreference_id'        => $request->memberreference_id,
                'memberreference_name'      => $p->name
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
                'name'                      => $request->name,
                'pob'                       => $request->pob,
                'dob'                       => $request->dob,
                'phonenumber'               => $request->phonenumber,
                'address'                   => $request->address,
                'email'                     => $request->email,
                'cv_link'                   => $request->cv_link,
                'sp_link'                   => $request->sp_link,
                'member_validthru'          => $request->member_validthru,
                'emergencycontact_name'     => $request->emergencycontact_name,
                'emergencycontact_phone'    => $request->emergencycontact_phone,
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

        // foreach($request->program as $program){
        //     DB::table('participants')->insert([
        //         'coach_id'      => $coach,
        //         'program_id'    => $request->program,
        //         'date'          => $request->date,
        //     ]);
        // }

        if($participant->memberreference_id){
            $p = Participant::find($request->memberreference_id);
            
            $participant->branch_id                 = $request->branch_id;
            $participant->knowcn_id                 = $request->knowcn_id;
            $participant->profession_id             = $request->profession_id;
            $participant->name                      = $request->name;
            $participant->pob                       = $request->pob;
            $participant->dob                       = $request->dob;
            $participant->phonenumber               = $request->phonenumber;
            $participant->address                   = $request->address;
            $participant->email                     = $request->email;
            $participant->cv_link                   = $request->cv_link;
            $participant->sp_link                   = $request->sp_link;
            $participant->member_validthru          = $request->member_validthru;
            $participant->emergencycontact_name     = $request->emergencycontact_name;
            $participant->emergencycontact_phone    = $request->emergencycontact_phone;
            $participant->memberreference_id        = $request->memberreference_id;
            $participant->memberreference_name      = $p->name;
        }else{
            $participant->branch_id                 = $request->branch_id;
            $participant->knowcn_id                 = $request->knowcn_id;
            $participant->profession_id             = $request->profession_id;
            $participant->name                      = $request->name;
            $participant->pob                       = $request->pob;
            $participant->dob                       = $request->dob;
            $participant->phonenumber               = $request->phonenumber;
            $participant->address                   = $request->address;
            $participant->email                     = $request->email;
            $participant->cv_link                   = $request->cv_link;
            $participant->sp_link                   = $request->sp_link;
            $participant->member_validthru          = $request->member_validthru;
            $participant->emergencycontact_name     = $request->emergencycontact_name;
            $participant->emergencycontact_phone    = $request->emergencycontact_phone;
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
}
