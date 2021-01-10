<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Result;
use App\Transaction;
use App\Participant;
use Session;

class ResultByIdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $results = Result::where('transaction_id', $id)->with('transaction')->get();
        $transaction = Transaction::where('id', $id)->first();

        return view('resultbyid.index', ['results'      => $results,
                                         'transaction'  => $transaction]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $currenttransaction = $id;

        return view('resultbyid.create')->with('currenttransaction', $currenttransaction);
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
            'score'    => 'required|numeric|max:100|min:0',
        ];

        $customMessages = [
            'score.required' => 'Nilai Ujian harus diisi.',
            'score.numeric'  => 'Nilai Ujian harus berupa angka.',
            'score.max'      => 'Nilai Ujian maksimum adalah 100.',
            'score.min'      => 'Nilai Ujian minimum adalah 0.'
        ];

        $this->validate($request, $rules, $customMessages);

        if($request->hasFile('photo')){
            $image = $request->file('photo');

            $fullImage = time().'.'.$image->getClientOriginalExtension();
            
            $path = public_path('/uploads/photo/');
            
            $image->move($path, $fullImage);
            
            $s = $request->score;
            $g;

            if($s >= 85 && $s <= 100){
                $g = 'A';
            }
            else if($s >= 75 && $s <= 84){
                $g = 'B';
            }
            else if($s >= 65 && $s <= 74){
                $g = 'C';
            }
            else if($s <= 64){
                $g = 'Gagal';
            }

            $result = Result::create([
                'transaction_id'                 => $request->id,
                'score'                          => $s,
                'grade'                          => $g,
                'jacket_size'                    => $request->jacket_size,
                'skillcertificate_number'        => $request->skillcertificate_number,
                'skillcertificate_pickdate'      => $request->skillcertificate_pickdate,
                'attendancecertificate_number'   => $request->attendancecertificate_number,
                'attendancecertificate_pickdate' => $request->attendancecertificate_pickdate,
                'photo'                          => $fullImage,
            ]);

            $transaction = Transaction::find($request->id);

            $transaction->result = 1;
    
            $transaction->save();
    
    
            $results = Result::where('transaction_id', $request->id)->with('transaction')->get();
            $transaction = Transaction::where('id', $request->id)->first();
            
            Session::flash('success', 'Berhasil Memperbaharui Data Nilai');
            return view('resultbyid.index', ['results'      => $results,
                                             'transaction'  => $transaction]);

        }
        else{

            $s = $request->score;
            $g;

            if($s >= 85 && $s <= 100){
                $g = 'A';
            }
            else if($s >= 75 && $s <= 84){
                $g = 'B';
            }
            else if($s >= 65 && $s <= 74){
                $g = 'C';
            }
            else if($s <= 64){
                $g = 'Gagal';
            }

            $result = Result::create([
                'transaction_id'                 => $request->id,
                'score'                          => $s,
                'grade'                          => $g,
                'jacket_size'                    => $request->jacket_size,
                'skillcertificate_number'        => $request->skillcertificate_number,
                'skillcertificate_pickdate'      => $request->skillcertificate_pickdate,
                'attendancecertificate_number'   => $request->attendancecertificate_number,
                'attendancecertificate_pickdate' => $request->attendancecertificate_pickdate,
            ]);

            $transaction = Transaction::find($request->id);

            $transaction->result = 1;

            $transaction->save();


            $results = Result::where('transaction_id', $request->id)->with('transaction')->get();
            $transaction = Transaction::where('id', $request->id)->first();
            
            Session::flash('success', 'Berhasil Memperbaharui Data Nilai');
            return view('resultbyid.index', ['results'      => $results,
                                            'transaction'  => $transaction]);
        }
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
        $result = Result::find($id)->with('transaction')->first();

        return view('resultbyid.edit')->with('result', $result);
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
        $result = Result::find($id);

        $rules = [
            'score'    => 'required|numeric|max:100|min:0',
        ];

        $customMessages = [
            'score.required' => 'Nilai Ujian harus diisi.',
            'score.numeric'  => 'Nilai Ujian harus berupa angka.',
            'score.max'      => 'Nilai Ujian maksimum adalah 100.',
            'score.min'      => 'Nilai Ujian minimum adalah 0.'
        ];

        $this->validate($request, $rules, $customMessages);

        if($request->hasFile('photo')){
            $image = $request->file('photo');

            $fullImage = time().'.'.$image->getClientOriginalExtension();
            
            $path = public_path('/uploads/photo/');
            
            $image->move($path, $fullImage);
            

            $result->photo = $fullImage;
        }

        $s = $request->score;
        $g;

        if($s >= 85 && $s <= 100){
            $g = 'A';
        }
        else if($s >= 75 && $s <= 84){
            $g = 'B';
        }
        else if($s >= 65 && $s <= 74){
            $g = 'C';
        }
        else if($s <= 64){
            $g = 'Gagal';
        }

        $result->id                             = $request->id;
        $result->score                          = $s;
        $result->grade                          = $g;
        $result->jacket_size                    = $request->jacket_size;
        $result->skillcertificate_number        = $request->skillcertificate_number;
        $result->skillcertificate_pickdate      = $request->skillcertificate_pickdate;
        $result->attendancecertificate_number   = $request->attendancecertificate_number;
        $result->attendancecertificate_pickdate = $request->attendancecertificate_pickdate;

        $result->save();

        
        $results = Result::where('transaction_id', $result->transaction_id)->with('transaction')->get();
        $transaction = Transaction::where('id', $result->transaction_id)->first();
        
        Session::flash('success', 'Berhasil Memperbaharui Data Nilai');
        return redirect()->route('resultbyid', ['id' => $result->transaction_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Result::find($id);

        $transaction = Transaction::find($result->transaction_id);

        $transaction->result = 0;

        $transaction->save();

        $result->delete();

        Session::flash('success', 'Berhasil Menghapus Data Nilai');

        return redirect()->route('transactions');
    }
}
