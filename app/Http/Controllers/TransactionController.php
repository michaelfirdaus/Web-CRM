<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Cache;
use App\Transaction;
use App\CoachProgram;
use App\Participant;
use App\Programname;
use App\Salesperson;
use App\Program;
use Carbon\Carbon;
use Auth;
use Session;
use DataTables;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $transactions = Transaction::with('participant', 'salesperson', 'program', 'program.programname', 'program.branch');
        $participants = Participant::all();
        $programs = Program::all();
        $salespersons = Salesperson::all();

        if($request->ajax()){
            return Datatables::of($transactions)
                ->editColumn('created_at', function($transactions){
                    return "<div>".$transactions->created_at."</div>";
                })
                ->editColumn('recoaching', function($transactions){
                    if($transactions->recoaching == 1){
                        return "<div class='text-center'>Ya</div>";
                    }
                    else{
                        return "<div class='text-center'>Tidak</div>";
                    }
                })
                ->editColumn('created_by', function($transactions){
                    return "<div class='text-center'>".$transactions->created_by."</div>";
                })
                ->editColumn('lastedited_by', function($transactions){
                    return "<div class='text-center'>".$transactions->lastedited_by."</div>";
                })
                ->editColumn('price', function($transactions){
                    return "<div class='text-center'>Rp. ".number_format($transactions->price, 0, ',', '.')."</div>";
                })
                ->addColumn('Nilai', function($transactions){
                    if($transactions->result_flag == 0) {
                        return 
                        "<div class='text-center'>
                            <a href='".route('resultbyid.create', ['id' => $transactions->id])."' class='btn btn-xs btn-success'>
                                <span class='fas fa-plus'></span>
                            </a>
                        </div>";
                    }
                    else
                    {
                        return 
                        "<div class='text-center'>
                            <a href='".route('resultbyid', ['id' => $transactions->id])."' class='btn btn-xs btn-success'>
                                <span class='fas fa-address-book'></span>
                            </a>
                        </div>";
                    }             
                })
                ->addColumn('Edit', function($transactions){
                    return 
                    "<div class='text-center'>
                        <a href='".route('transaction.edit', ['id' => $transactions->id])."' class='btn btn-xs btn-info'>
                            <span class='fas fa-pencil-alt'></span>
                        </a>
                    </div>";
                })
                ->addColumn('Hapus', function($transactions){
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
                                <a href='".route('transaction.delete', ['id' => $transactions->id])."' class='btn btn btn-danger'>
                                <span class='fas fa-check mr-1'></span>
                                Hapus
                                </a>
                            </div>
                            </div>
                        </div>
                    </div>
                    ";
                })
                ->rawColumns(['recoaching', 'price', 'Nilai', 'Edit', 'Hapus', 'created_at', 'created_by', 'lastedited_by'])
                ->make();   
        }

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
        $salespersons = Salesperson::where('status', 1)->get();
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
        ];

        $customMessages = [
            'participant.required' => 'Nama Peserta harus dipilih.',
            'sales.required'       => 'Nama Sales harus dipilih.',
            'program.required'     => 'Batch Program harus dipilih.',
            'program.unique'       => 'Peserta sudah terdaftar di kelas ini.',
            'price.required'       => 'Harga harus diisi.',
        ];

        $this->validate($request, $rules, $customMessages);

        $transactions = Transaction::where('program_id',$request->program)->get();
        foreach($transactions as $t)
            if($t->participant_id == $request->participant){
                Session::flash('warning', 'Peserta ini sudah terdaftar di kelas ini! Apabila ingin recoaching, silahkan edit data transaksi peserta');
                 return redirect()->back();
            }

        $price = (int)str_replace(".", "", $request->price);

        
        $transactions = Transaction::create([
            'participant_id'    => $request->participant,
            'salesperson_id'    => $request->sales,
            'program_id'        => $request->program,
            'price'             => $price,
            'rating'            => $request->rating,
            'rating_text'       => ucfirst($request->rating_text),
            'note'              => ucfirst($request->note),
            'created_by'        => Auth::user()->name,
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
        $programs = Program::all();
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
        ];

        $customMessages = [
            'participant.required'   => 'Nilai Peserta harus dipilih.',
            'sales.required'         => 'Nama Sales harus dipilih.',
            'program.required'       => 'Batch Program harus dipilih.',
            'price.required'         => 'Harga harus diisi.',
            'recoaching.required'    => 'Recoaching harus dipilih.'    
        ];

        $this->validate($request, $rules, $customMessages);

        $price = (int)str_replace(".", "", $request->price);

        
        if($request->recoaching == 1 && $transaction->recoaching_count < 3){
            $transaction->recoaching_count++;
        }

        if($transaction->recoaching_count < 4){
            $transaction->participant_id    = $request->participant;
            $transaction->salesperson_id    = $request->sales;
            $transaction->program_id        = $request->program;
            $transaction->price             = $price;
            $transaction->rating            = $request->rating;
            $transaction->rating_text       = ucfirst($request->rating_text);
            $transaction->recoaching        = $request->recoaching;
            $transaction->note              = ucfirst($request->note);
            $transaction->lastedited_by     = Auth::user()->name;
        }
        else{
            $transaction->participant_id    = $request->participant;
            $transaction->salesperson_id    = $request->sales;
            $transaction->program_id        = $request->program;
            $transaction->price             = $price;
            $transaction->rating            = $request->rating;
            $transaction->rating_text       = ucfirst($request->rating_text);
            $transaction->note              = ucfirst($request->note);
            $transaction->recoaching        = 0;
            $transaction->lastedited_by     = Auth::user()->name;
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

    public function fetch(Request $request){
        $a = Program::find($request->id);
        $fill = Programname::find($a->programname_id);
        return response()->json($fill->program_price);
    }

}
