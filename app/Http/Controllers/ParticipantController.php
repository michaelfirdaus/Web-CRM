<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Participant;
use App\Branch;
use App\Program;
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
        $participants = Participant::with('branch', 'knowcn', 'program', 'profession')->get();

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
        $programs = Program::all();
        $knowcns = Knowcn::all();
        $professions = Profession::all();

        if($branches->count() == 0 || $programs->count() == 0){
            Session::flash('info', 'Tidak Dapat Menambahkan Peserta karena Lokasi Kelas/Program Tidak Tersedia');
            return redirect()->back();
        }

        return view('participant.create')
            ->with('branches', $branches)
            ->with('programs', $programs)
            ->with('knowcns', $knowcns)
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
        $this->validate($request, [
            'branch_id'                 => 'required',
            'knowcn_id'                 => 'required',
            'name'                      => 'required',
            'pob'                       => 'required',
            'dob'                       => 'required',
            'phonenumber'               => 'required',
            'address'                   => 'required',
            'email'                     => 'required|email',
            'cv_link'                   => 'required|url',
            'emergencycontact_name'     => 'required',
            'emergencycontact_phone'    => 'required'   
        ]);

        // foreach($request->program as $program){
        //     DB::table('participants')->insert([
        //         'coach_id'      => $coach,
        //         'program_id'    => $request->program,
        //         'date'          => $request->date,
        //     ]);
        // }
        
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

        $participants = Participant::create([
            'id'                        => $membernum->lastnumber,
            'branch_id'                 => $request->branch_id,
            'knowcn_id'                 => $request->knowcn_id,
            'program_id'                => $request->program_id,
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
            'emergencycontact_phone'    => $request->emergencycontact_phone  
        ]);

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
        $branches = Branch::all();
        $programs = Program::all();
        $knowcns = Knowcn::all();
        $professions = Profession::all();

        return view('participant.edit')
            ->with('branches', $branches)
            ->with('programs', $programs)
            ->with('knowcns', $knowcns)
            ->with('participant', $participant)
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

        $this->validate($request, [
            'branch_id'                 => 'required',
            'knowcn_id'                 => 'required',
            'name'                      => 'required',
            'pob'                       => 'required',
            'dob'                       => 'required',
            'phonenumber'               => 'required',
            'address'                   => 'required',
            'email'                     => 'required|email',
            'cv_link'                   => 'required|url',
            'emergencycontact_name'     => 'required',
            'emergencycontact_phone'    => 'required'   
        ]);

        // foreach($request->program as $program){
        //     DB::table('participants')->insert([
        //         'coach_id'      => $coach,
        //         'program_id'    => $request->program,
        //         'date'          => $request->date,
        //     ]);
        // }

        $participant->branch_id                 = $request->branch_id;
        $participant->knowcn_id                 = $request->knowcn_id;
        $participant->program_id                = $request->program_id;
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
