<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Know;
use Session;
use DataTables;

class KnowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Get all knows
        $knows = Know::all();

        //DataTables server-side rendering
        if($request->ajax()){
            return DataTables::of($knows)
                ->editColumn('status', function($knows){
                    if($knows->status == 1){
                        return "<div class='text-center'>Aktif</div>";
                    }else{
                        return "<div class='text-center'>Tidak Aktif</div>";
                    }
                })
                ->addColumn('Edit', function($knows){
                    return
                    "<div class='text-center'>
                        <a href='".route('know.edit', ['id' => $knows ->id])."' class='btn btn-xs btn-info'>
                            <span class='fas fa-pencil-alt'></span>
                        </a>
                    </div>";
                })
                ->rawColumns(['status', 'Edit'])
                ->make();
        }
        //Redirecting user to know index view
        return view('know.index')->with('knows', $knows);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Redirecting user to know create view
        return view('know.create');
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
            'name'   => 'required|unique:knows',
            'status' => 'required'      
        ];
        //Custom validation message
        $customMessages = [
            'name.required'   => 'Nama Kanal harus diisi.',
            'name.unique'     => 'Nama Kanal sudah terdaftar, silahkan coba lagi.',
            'status.required' => 'Status Kanal harus dipilih.'
        ];

        $this->validate($request, $rules, $customMessages);

        $know = new Know;

        $know->name   = ucwords($request->name);
        $know->status = $request->status;
        //Save current know
        $know->save();

        //Notify user with pop up message
        Session::flash('success', 'Berhasil Menambahkan Kanal Baru');

        //Redirecting user to knows route
        return redirect()->route('knows');
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
        //Find know by id
        $know = Know::find($id);

        //Redirecting user to know edit view
        return view('know.edit')->with('know', $know); 
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
        //Input validation
        $rules = [
            'name'   => 'required',
            'status' => 'required'
        ];
        //Custom validation message
        $customMessages = [
            'name.required' => 'Nama Kanal harus diisi.',
            'status.required' => 'Status Kanal harus dipilih.'
        ];

        $this->validate($request, $rules, $customMessages);

        //Get know by id
        $know = Know::find($id);
        
        $know->name   = ucwords($request->name);
        $know->status = $request->status; 
        //Save current know
        $know->save();

        //Notify user with pop up message
        Session::flash('success', 'Berhasil Memperbaharui Kanal');

        //Redirecting user to knows route
        return redirect()->route('knows');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Get know by id
        $know = Know::find($id);

        //Delete know
        $know->delete();

        //Notify user with pop up message
        Session::flash('success', 'Berhasil Menghapus Kanal');

        //Redirecting user to knows route
        return redirect()->route('knows');
    }
}
