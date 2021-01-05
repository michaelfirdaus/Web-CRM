<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Transaction;
use App\CoachProgram;
use App\Participant;
use App\Salesperson;
use Session;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::all();
        $participants = Participant::all();
        $coachprograms = CoachProgram::all();
        $salespersons = Salesperson::all();

        return view('transaction.index')
            ->with('transactions', $transactions)
            ->with('participants', $participants)
            ->with('coachprograms', $coachprograms)
            ->with('salespersons', $salespersons);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $participants = Participant::all();
        $coachprograms = CoachProgram::with('program')->get();
        $salespersons = Salesperson::all();
        if($participants->count() == 0 || $coachprograms->count() == 0 || $salespersons->count() == 0){
            Session::flash('info', 'Tidak Dapat Menambahkan Transaksi karena Peserta/Jadwal Kelas/Sales Tidak Terdaftar');
            return redirect()->back();
        }

        return view('transaction.create')
            ->with('participants', $participants)
            ->with('coachprograms', $coachprograms)
            ->with('salespersons', $salespersons);
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
            'participant'       => 'required',
            'sales'             => 'required',
            'program'           => 'required',
            'price'             => 'required',
            'firsttrans'        => 'required',
            'recoaching'        => 'required',
        ]);

        $transactions = Transaction::create([
            'participant_id'    => $request->participant,
            'salesperson_id'    => $request->sales,
            'coach_program_id'  => $request->program,
            'price'             => $request->price,
            'firsttrans'        => $request->firsttrans,
            'secondtrans'       => $request->secondtrans,
            'cashback'          => $request->cashback,
            'rating'            => $request->rating,
            'rating_text'       => $request->rating_text,
            'recoaching'        => $request->recoaching,
            'note'              => $request->note
        ]);
        
        Session::flash('success', 'Berhasil Menambahkan Transaksi');

        return redirect()->route('transactions');

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
        $transaction = Transaction::find($id);
        $coachprograms = CoachProgram::all();
        $participants = Participant::all();
        $salespersons = Salesperson::all();

        return view('transaction.edit')
            ->with('transaction', $transaction)
            ->with('participants', $participants)
            ->with('coachprograms', $coachprograms)
            ->with('salespersons', $salespersons);

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
        $transaction = Transaction::find($id);

        $this->validate($request, [
            'participant'       => 'required',
            'sales'             => 'required',
            'program'           => 'required',
            'firsttrans'        => 'required',
            'price'             => 'required',
            'recoaching'        => 'required',
        ]);

        $transaction->participant_id    = $request->participant;
        $transaction->salesperson_id    = $request->sales;
        $transaction->coach_program_id  = $request->program;
        $transaction->price             = $request->price;
        $transaction->firsttrans        = $request->firsttrans;
        $transaction->secondtrans       = $request->secondtrans;
        $transaction->cashback          = $request->cashback;
        $transaction->rating            = $request->rating;
        $transaction->rating_text       = $request->rating_text;
        $transaction->recoaching        = $request->recoaching;
        $transaction->note              = $request->note;
        
        Session::flash('success', 'Berhasil Memperbaharui Transaksi');

        return redirect()->route('transactions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaction = Transaction::find($id);

        $transaction->delete();

        Session::flash('success', 'Berhasil Menghapus Transaksi');

        return redirect()->route('transactions');
    }
}
