<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Jobconnector;
use Session;
use DataTables;

class JobconnectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Get all jobconnectors
        $jobconnectors = Jobconnector::all();
        //DataTables server-side rendering
        if($request->ajax()){
            return DataTables::of($jobconnectors)
                ->editColumn('status', function($jobconnectors){
                    if($jobconnectors->status == 1){
                        return "<div class='text-center'>Aktif</div>";
                    }else{
                        return "<div class='text-center>Tidak Aktif</div>";
                    }
                })
                ->addColumn('Edit', function($jobconnectors){
                    return
                    "<div class='text-center'>
                        <a href='".route('jobconnector.edit', ['id' => $jobconnectors ->id])."' class='btn btn-xs btn-info'>
                            <span class='fas fa-pencil-alt'></span>
                        </a>
                    </div>";
                })
                ->rawColumns(['status', 'Edit'])
                ->make();
        }
        //Redirecting user to jobconnector index view
        return view('jobconnector.index')->with('jobconnectors', $jobconnectors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Redirecting user to jobconnector create view
        return view('jobconnector.create');
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
            'name'            => 'required|unique:jobconnectors',
            'location'        => 'required',
        ];
        
        //Custom validation message
        $customMessages = [
            'name.required'            => 'Nama Perusahaan harus diisi.',
            'location.required'        => 'Lokasi Perusahaan harus diisi.',
            'name.unique'              => 'Nama Peerusahaan sudah terdaftar, silahkan coba lagi.',
        ];

        $this->validate($request, $rules, $customMessages);

        $jobconnector = new Jobconnector;

        $jobconnector->name     = ucwords($request->name);
        $jobconnector->location = ucwords($request->location);
        //Save current jobconnector
        $jobconnector->save();

        //Notify user with pop up message
        Session::flash('success', 'Berhasil Menambahkan Perusahaan');

        //Redirecting user to jobconnectors route
        return redirect()->route('jobconnectors');
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
        //Get jobconnector by id
        $jobconnector = Jobconnector::find($id);

        //Redirecting user to jobconnector edit view
        return view('jobconnector.edit')->with('jobconnector', $jobconnector); 
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
        //Input valdiation
        $rules = [
            'name'            => 'required',
            'location'        => 'required',
        ];

        //Custom validation message
        $customMessages = [
            'name.required'            => 'Nama Perusahaan harus diisi.',
            'location.required'        => 'Lokasi Perusahaan harus diisi.',
        ];

        $this->validate($request, $rules, $customMessages);

        //Find jobconnector by id
        $jobconnector = Jobconnector::find($id);
        
        $jobconnector->name = ucwords($request->name);
        $jobconnector->location     = ucwords($request->location);
        
        //Save current jobconnector
        $jobconnector->save();

        //Notify user with pop up message
        Session::flash('success', 'Berhasil Memperbaharui Perusahaan');

        //Redirecting user to jobconnectors route
        return redirect()->route('jobconnectors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Get jobconnector by id
        $jobconnector = Jobconnector::find($id);

        //Delete jobconnector
        $jobconnector->delete();

        //Notify user with pop up message
        Session::flash('success', 'Berhasil Menghapus Perusahaan');

        //Redirecting user to jobconnectors route
        return redirect()->route('jobconnectors');
    }
}
