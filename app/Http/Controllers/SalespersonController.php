<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

use App\Salesperson;
use DataTables;
use Session;

class SalespersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Get all salesperson
        $salespersons = Salesperson::all();

        //DataTables server-side rendering
        if($request->ajax()){
            return DataTables::of($salespersons) 
                ->editColumn('status', function($salespersons){
                    if($salespersons->status == 1){
                        return "<div class='text-center'>Aktif</div>";
                    }
                    else{
                        return "<div class='text-center'>Tidak Aktif</div>";
                    }
                })
                ->addColumn('Edit', function($salespersons){
                    return 
                    "<div class='text-center'>
                        <a href='".route('salesperson.edit', ['id' => $salespersons ->id])."' class='btn btn-xs btn-info'>
                            <span class='fas fa-pencil-alt'></span>
                        </a>
                    </div>";
                }) 
                ->rawColumns(['status', 'Edit'])
                ->make();  
        }
        //Redirecting user to salesperson index view
        return view('salesperson.index')->with('salespersons', $salespersons);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Redirecting user to salesperson create view
        return view('salesperson.create');
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
            'name'   => 'required|unique:salespersons',
            'status' => 'required|boolean'
        ];
        //Custom validation message
        $customMessages = [
            'name.required'   => 'Nilai Sales harus diisi.',
            'name.unique'     => 'Nama Sales sudah terdaftar, silahkan coba lagi.',
            'status.required' => 'Status harus dipilih.',
        ];

        $this->validate($request, $rules, $customMessages);

        $salesperson = new Salesperson;

        $salesperson->name   = ucwords($request->name);
        $salesperson->status = $request->status;
        //Save current salesperson
        $salesperson->save();

        //Notify user with pop up message
        Session::flash('success', 'Berhasil Menambahkan Sales Baru');

        //Redirecting user to salespersons route
        return redirect()->route('salespersons');

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
        //Salesperson by id
        $salesperson = Salesperson::find($id);

        //Redirecting user salesperson edit view
        return view('salesperson.edit')->with('salesperson', $salesperson); 
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
            'status' => 'required|boolean'
        ];
        //Custom validation message
        $customMessages = [
            'name.required'   => 'Nilai Sales harus diisi.',
            'status.required' => 'Status harus dipilih.',
        ];

        $this->validate($request, $rules, $customMessages);

        //Get salesperson  by id
        $salesperson = Salesperson::find($id);
        
        $salesperson->name   = ucwords($request->name);
        $salesperson->status = $request->status;
        
        //Save current salesperson
        $salesperson->save();

        //Notify user with pop up message
        Session::flash('success', 'Berhasil Memperbaharui Sales');

        //Redirecting user to salespersons route
        return redirect()->route('salespersons');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Get salesperson by id
        $salesperson = Salesperson::find($id);

        //Delete salesperson
        $salesperson->delete();

        //Notify user with pop up message
        Session::flash('success', 'Berhasil Menghapus Sales');

        //Redirecting user to salespersons
        return redirect()->route('salespersons');
    }
}
