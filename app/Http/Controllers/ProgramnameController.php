<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Programname;
use Session;
use DataTables;

class ProgramnameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $programnames = Programname::all();
        
        if($request->ajax()){
            return DataTables::of($programnames)
                ->editColumn('program_price', function($programnames){
                    return "<div class='text-center'>Rp. ".number_format($programnames->program_price, 0, ',', '.')."</div>";
                })
                ->editColumn('status', function($programnames){
                    if($programnames->status == 1){
                        return "<div class='text-center'>Aktif</div>";
                    }else{
                        return "<div class='text-center'>Tidak Aktif</div>";
                    }
                })
                ->addColumn('Edit', function($programnames){
                    return
                    "<div class='text-center'>
                        <a href='".route('programname.edit', ['id' => $programnames ->id])."' class='btn btn-xs btn-info'>
                            <span class='fas fa-pencil-alt'></span>
                        </a>
                    </div>";
                })
                ->rawColumns(['program_price', 'status', 'Edit'])
                ->make();
        }

        return view('programname.index')->with('programnames', $programnames);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('programname.create');
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
            'name'   => 'required|unique:programnames',
            'price'  => 'required|min:0',
            'status' => 'required'      
        ];

        $customMessages = [
            'name.required'   => 'Nama Program harus diisi.',
            'name.unique'     => 'Nama Program sudah terdaftar, silahkan coba lagi.',
            'price.required'  => 'Harga harus diisi.',
            'price.min'       => 'Harga minimal 0.',
            'status.required' => 'Status Program harus dipilih.'
        ];

        $this->validate($request, $rules, $customMessages);

        $p = (int)str_replace(".", "", $request->price);

        $pn = new Programname;

        $pn->name           = ucwords($request->name);
        $pn->program_price  = $p;
        $pn->status         = $request->status;
        //Saving current category to the database
        $pn->save();

        //Notify user with pop up message
        Session::flash('success', 'Berhasil Menambahkan Nama Program Baru');

        //Redirecting user to categories route
        return redirect()->route('programnames');
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
        $pn = Programname::find($id);

        return view('programname.edit')->with('programname', $pn);
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
            'name'   => 'required',
            'price'  => 'required|min:0',
            'status' => 'required'      
        ];

        $customMessages = [
            'name.required'   => 'Nama Program harus diisi.',
            'name.unique'     => 'Nama Program sudah terdaftar, silahkan coba lagi.',
            'price.required'  => 'Harga harus diisi.',
            'price.min'       => 'Harga minimal 0.',
            'status.required' => 'Status Program harus dipilih.'
        ];

        $this->validate($request, $rules, $customMessages);

        $p = (int)str_replace(".", "", $request->price);

        //Find category based on category ID
        $pn = Programname::find($id);
        
        $pn->name           = ucwords($request->name);
        $pn->program_price  = $p;
        $pn->status         = $request->status; 
        //Save the category to the database
        $pn->save();

        //Notify user with pop up message
        Session::flash('success', 'Berhasil Memperbaharui Program Course-Net');

        //Redirecting user to categories route
        return redirect()->route('programnames');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pn = Programname::find($id);

        $pn->delete();

        Session::flash('success', 'Berhasil Menghapus Program');
        return redirect()->route('programnames');
    }
}
