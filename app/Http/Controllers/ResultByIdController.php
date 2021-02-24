<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Result;
use App\Transaction;
use App\Participant;
use Auth;
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
        //Get result by transaction_id
        $result = Result::where('transaction_id', $id)->with('transaction','transaction.participant')->first();
        
        //Redirecting user to resultbyid index view
        return view('resultbyid.index', ['result'=> $result]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //Get transaction by id
        $transaction = Transaction::find($id);

        //Redirecting user to resultbyid create view
        return view('resultbyid.create')
            ->with('currenttransaction', $id)
            ->with('transaction', $transaction);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Input validation
        $rules = [
            'score'    => 'required|numeric|max:100|min:0',
        ];
        //Custom validation message
        $customMessages = [
            'score.required' => 'Nilai Ujian harus diisi.',
            'score.numeric'  => 'Nilai Ujian harus berupa angka.',
            'score.max'      => 'Nilai Ujian maksimum adalah 100.',
            'score.min'      => 'Nilai Ujian minimum adalah 0.'
        ];

        $this->validate($request, $rules, $customMessages);

        //Check if user uploaded photo
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
                'jacket_size'                    => strtoupper($request->jacket_size),
                'skillcertificate_number'        => $request->skillcertificate_number,
                'skillcertificate_pickdate'      => $request->skillcertificate_pickdate,
                'attendancecertificate_number'   => $request->attendancecertificate_number,
                'attendancecertificate_pickdate' => $request->attendancecertificate_pickdate,
                'photo'                          => $fullImage,
            ]);

            $transaction = Transaction::find($request->id);

            $transaction->result_id = $result->id;
            $transaction->result_flag = 1;
            $transaction->lastedited_by = Auth::user()->name;
            $transaction->save();
            
            Session::flash('success', 'Berhasil Memperbaharui Data Nilai');
            return redirect()->route('resultbyid', ['id'  => $transaction->id]);

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
                'jacket_size'                    => strtoupper($request->jacket_size),
                'skillcertificate_number'        => $request->skillcertificate_number,
                'skillcertificate_pickdate'      => $request->skillcertificate_pickdate,
                'attendancecertificate_number'   => $request->attendancecertificate_number,
                'attendancecertificate_pickdate' => $request->attendancecertificate_pickdate,
            ]);

            $transaction = Transaction::find($request->id);

            $transaction->result_id = $result->id;
            $transaction->result_flag = 1;
            //Save current transaction
            $transaction->save();

            //Notify user with pop up message
            Session::flash('success', 'Berhasil Input Data Nilai');
            //Redirecting user to resultbyid route
            return redirect()->route('resultbyid', ['id'  => $transaction->id]);
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
        //Get result by id
        $result = Result::where('id', $id)->with('transaction', 'transaction.participant')->first();

        //Redirecting user to resultbyid edit view
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
        //Get result by id
        $result = Result::find($id);

        //Get transaction by result_id
        $transaction = Transaction::where('result_id', $id)->first();
        //Input validation
        $rules = [
            'score'    => 'required|numeric|max:100|min:0',
        ];
        //Custom validation message
        $customMessages = [
            'score.required' => 'Nilai Ujian harus diisi.',
            'score.numeric'  => 'Nilai Ujian harus berupa angka.',
            'score.max'      => 'Nilai Ujian maksimum adalah 100.',
            'score.min'      => 'Nilai Ujian minimum adalah 0.'
        ];

        $this->validate($request, $rules, $customMessages);
        //Check if user uploaded photo
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
        $result->jacket_size                    = strtoupper($request->jacket_size);
        $result->skillcertificate_number        = $request->skillcertificate_number;
        $result->skillcertificate_pickdate      = $request->skillcertificate_pickdate;
        $result->attendancecertificate_number   = $request->attendancecertificate_number;
        $result->attendancecertificate_pickdate = $request->attendancecertificate_pickdate;
        //Save current result
        $result->save();

        $transaction->lastedited_by = Auth::user()->name;
        //Save current transaction
        $transaction->save();

        //Notify user with pop up message
        Session::flash('success', 'Berhasil Memperbaharui Data Nilai');
        
        //Redirecting user to resultbyid route
        return redirect()->route('resultbyid', ['id' => $result->transaction->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Get result by id
        $result = Result::find($id);
        //Get transaction by id
        $transaction = Transaction::find($result->transaction_id);
        
        $transaction->result_flag = 0;
        //Save current transaction
        $transaction->save();

        //Delete result
        $result->delete();
        //Notify user with pop up message
        Session::flash('success', 'Berhasil Menghapus Data Nilai');
        //Redirecting user to transactions route
        return redirect()->route('transactions');
    }
}
