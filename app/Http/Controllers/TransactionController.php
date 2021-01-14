<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Transaction;
use App\CoachProgram;
use App\Participant;
use App\Salesperson;
use App\Program;
use Carbon\Carbon;
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
        $transactions = Transaction::with('program.programname')->get();
        $participants = Participant::all();
        $programs = Program::all();
        $salespersons = Salesperson::all();

        return view('transaction.index')
            ->with('transactions', $transactions)
            ->with('participants', $participants)
            ->with('programs', $programs)
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
        $date = Carbon::today()->subDays(7);
        $programs = Program::orderBy('date', 'DESC')->where('date', '>=', $date)->get();
        $salespersons = Salesperson::where('status','1')->get();
        if($participants->count() == 0 || $programs->count() == 0 || $salespersons->count() == 0){
            Session::flash('info', 'Tidak Dapat Menambahkan Transaksi karena Peserta/Jadwal Kelas/Sales Tidak Terdaftar');
            return redirect()->back();
        }
        

        return view('transaction.create')
            ->with('participants', $participants)
            ->with('programs', $programs)
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

        $rules = [
            'participant'       => 'required',
            'sales'             => 'required',
            'program'           => 'required',
            'price'             => 'required|min:0',
            'firsttrans'        => 'required|min:0',
        ];

        $customMessages = [
            'participant.required' => 'Nama Peserta harus dipilih.',
            'sales.required'       => 'Nama Sales harus dipilih.',
            'program.required'     => 'Batch Program harus dipilih.',
            'program.unique'       => 'Peserta sudah terdaftar di kelas ini.',
            'price.required'       => 'Harga harus diisi.',
            'firsttrans.required'  => 'DP Pertama harus diisi.',
        ];

        $this->validate($request, $rules, $customMessages);

        $transactions = Transaction::where('program_id',$request->program)->get();
        foreach($transactions as $t)
            if($t->participant_id == $request->participant){
                Session::flash('warning', 'Peserta ini sudah terdaftar di kelas ini! Apabila ingin recoaching, silahkan edit data transaksi peserta');
                 return redirect()->back();
            }

        $price = (int)str_replace(".", "", $request->price);
        $firsttrans = (int)str_replace(".", "", $request->firsttrans);
        $secondtrans = (int)str_replace(".", "", $request->secondtrans);
        $cashback = (int)str_replace(".", "", $request->cashback);

        $transactions = Transaction::create([
            'participant_id'    => $request->participant,
            'salesperson_id'    => $request->sales,
            'program_id'        => $request->program,
            'price'             => $price,
            'firsttrans'        => $firsttrans,
            'secondtrans'       => $secondtrans,
            'cashback'          => $cashback,
            'rating'            => $request->rating,
            'rating_text'       => $request->rating_text,
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
        $date = Carbon::today()->subDays(7);
        $programs = Program::with('programname','branch')->where('date', '>=', $date)->get();
        $participants = Participant::all();
        $salespersons = Salesperson::all();

        return view('transaction.edit')
            ->with('transaction', $transaction)
            ->with('participants', $participants)
            ->with('programs', $programs)
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

        $rules = [
            'participant'       => 'required',
            'sales'             => 'required',
            'program'           => 'required',
            'price'             => 'required|min:0',
            'firsttrans'        => 'required|min:0',
            'recoaching'        => 'required|boolean',
        ];

        $customMessages = [
            'participant.required'   => 'Nilai Peserta harus dipilih.',
            'sales.required'         => 'Nama Sales harus dipilih.',
            'program.required'       => 'Batch Program harus dipilih.',
            'price.required'         => 'Harga harus diisi.',
            'firsttrans.required'    => 'DP Pertama harus diisi.',
            'recoaching.required'    => 'Recoaching harus dipilih.'    
        ];

        $this->validate($request, $rules, $customMessages);

        $price = (int)str_replace(".", "", $request->price);
        $firsttrans = (int)str_replace(".", "", $request->firsttrans);
        $secondtrans = (int)str_replace(".", "", $request->secondtrans);
        $cashback = (int)str_replace(".", "", $request->cashback);

        
        if($request->recoaching == 1 && $transaction->recoaching_count < 3){
            $transaction->recoaching_count++;
        }

        if($transaction->recoaching_count < 4){
            $transaction->participant_id    = $request->participant;
            $transaction->salesperson_id    = $request->sales;
            $transaction->program_id        = $request->program;
            $transaction->price             = $price;
            $transaction->firsttrans        = $firsttrans;
            $transaction->secondtrans       = $secondtrans;
            $transaction->cashback          = $cashback;
            $transaction->rating            = $request->rating;
            $transaction->rating_text       = $request->rating_text;
            $transaction->recoaching        = $request->recoaching;
            $transaction->note              = $request->note;
        }
        else{
            $transaction->participant_id    = $request->participant;
            $transaction->salesperson_id    = $request->sales;
            $transaction->program_id        = $request->program;
            $transaction->price             = $price;
            $transaction->firsttrans        = $firsttrans;
            $transaction->secondtrans       = $secondtrans;
            $transaction->cashback          = $cashback;
            $transaction->rating            = $request->rating;
            $transaction->rating_text       = $request->rating_text;
            $transaction->note              = $request->note;
        }

        $transaction->save();
        
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
