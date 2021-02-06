<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Coach;
use Session;
use DataTables;

class CoachController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $coaches = Coach::all();

        if($request->ajax()){
            return DataTables::of($coaches)
                ->editColumn('phonenumber', function($coaches){
                    return "<div class='text-center'>".$coaches->phonenumber."</div>";
                })
                ->editColumn('dob', function($coaches){
                    return "<div class='text-center'>".$coaches->dob."</div>";
                })
                ->editColumn('status', function($coaches){
                    if($coaches->status == 1){
                        return "<div class='text-center'>Aktif</div>";
                    }
                    else{
                        return "<div class='text-center'>Tidak Aktif</div>";
                    }
                })
                ->addColumn('Edit', function($coaches){
                    return 
                    "<div class='text-center'>
                        <a href='".route('coach.edit', ['id' => $coaches ->id])."' class='btn btn-xs btn-info'>
                            <span class='fas fa-pencil-alt'></span>
                        </a>
                    </div>";
                })
                ->rawColumns(['phonenumber', 'dob', 'status', 'Edit'])
                ->make();
        }

        return view('coach.index')->with('coaches', Coach::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('coach.create');
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
            'name'          => 'required',
            'email'         => 'required',
            'phonenumber'   => 'required|numeric',
            'dob'           => 'required|date',
            'address'       => 'required',
            'status'        => 'required'
        ];

        $customMessages = [
            'name.required'            => 'Nama Coach harus diisi.',
            'email.required'           => 'Email Coach harus diisi.',
            'phonenumber.required'     => 'Nomor Telepon harus diisi.',
            'phonenumber.numeric'      => 'Nomor Telepon harus angka.',
            'dob.required'             => 'Tanggal Lahir harus diisi.',
            'dob.date'                 => 'Tanggal Lahir harus berupa tanggal.',
            'address.required'         => 'Alamat harus diisi.',
            'status.required'          => 'Status Coach harus dipilih.'
        ];

        $this->validate($request, $rules, $customMessages);

        $coach = new Coach;

        $coach->name        = ucwords($request->name);
        $coach->email       = $request->email;
        $coach->phonenumber = $request->phonenumber;
        $coach->dob         = $request->dob;
        $coach->address     = ucwords($request->address);
        $coach->status      = $request->status;
        //Saving current category to the database
        $coach->save();

        //Notify user with pop up message
        Session::flash('success', 'Berhasil Menambahkan Coach Baru');

        //Redirecting user to categories route
        return redirect()->route('coaches');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Find category based on category ID
        $coach = Coach::find($id);

        //Redirecting user to admin/categories/edit view with the specific category
        return view('coach.edit')->with('coach', $coach); 
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
        $rules = [
            'name'          => 'required',
            'email'         => 'required',
            'phonenumber'   => 'required|numeric',
            'dob'           => 'required|date',
            'address'       => 'required',
            'status'        => 'required'
        ];

        $customMessages = [
            'name.required'            => 'Nama Coach harus diisi.',
            'email.required'           => 'Email Coach harus diisi.',
            'phonenumber.required'     => 'Nomor Telepon harus diisi.',
            'phonenumber.numeric'      => 'Nomor Telepon harus angka.',
            'dob.required'             => 'Tanggal Lahir harus diisi.',
            'dob.date'                 => 'Tanggal Lahir harus berupa tanggal.',
            'address.required'         => 'Alamat harus diisi.',
            'status.required'          => 'Status Coach harus dipilih.'
        ];

        $this->validate($request, $rules, $customMessages);

        //Find category based on category ID
        $coach = Coach::find($id);
        
        $coach->name        = ucwords($request->name);
        $coach->email       = $request->email;
        $coach->phonenumber = $request->phonenumber;
        $coach->dob         = $request->dob;
        $coach->address     = ucwords($request->address);
        $coach->status      = $request->status;
        
        //Save the category to the database
        $coach->save();

        //Notify user with pop up message
        Session::flash('success', 'Berhasil Memperbaharui Coach');

        //Redirecting user to categories route
        return redirect()->route('coaches');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         //Find category based on category ID
         $coach = Coach::find($id);

         //Delete category
         $coach->delete();
 
         //Notify user with pop up message
         Session::flash('success', 'Berhasil Menghapus Coach');
 
         //Redirecting user to categories route
         return redirect()->route('coaches');
    }
}
