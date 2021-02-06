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
        $jobconnectors = Jobconnector::all();

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

        return view('jobconnector.index')->with('jobconnectors', $jobconnectors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        //Validation to make sure name field should be filled and the category must be unique

        $rules = [
            'name'            => 'required|unique:jobconnectors',
            'location'        => 'required',
        ];

        $customMessages = [
            'name.required'            => 'Nama Perusahaan harus diisi.',
            'location.required'        => 'Lokasi Perusahaan harus diisi.',
            'name.unique'              => 'Nama Peerusahaan sudah terdaftar, silahkan coba lagi.',
        ];

        $this->validate($request, $rules, $customMessages);

        $jobconnector = new Jobconnector;

        $jobconnector->name     = ucwords($request->name);
        $jobconnector->location = ucwords($request->location);
        //Saving current category to the database
        $jobconnector->save();

        //Notify user with pop up message
        Session::flash('success', 'Berhasil Menambahkan Perusahaan');

        //Redirecting user to categories route
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
        //Find category based on category ID
        $jobconnector = Jobconnector::find($id);

        //Redirecting user to admin/categories/edit view with the specific category
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
        $rules = [
            'name'            => 'required',
            'location'        => 'required',
        ];

        $customMessages = [
            'name.required'            => 'Nama Perusahaan harus diisi.',
            'location.required'        => 'Lokasi Perusahaan harus diisi.',
        ];

        $this->validate($request, $rules, $customMessages);

        //Find category based on category ID
        $jobconnector = Jobconnector::find($id);
        
        $jobconnector->company_name = ucwords($request->name);
        $jobconnector->location     = ucwords($request->location);
        
        //Save the category to the database
        $jobconnector->save();

        //Notify user with pop up message
        Session::flash('success', 'Berhasil Memperbaharui Perusahaan');

        //Redirecting user to categories route
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
        //Find category based on category ID
        $jobconnector = Jobconnector::find($id);

        //Delete category
        $jobconnector->delete();

        //Notify user with pop up message
        Session::flash('success', 'Berhasil Menghapus Perusahaan');

        //Redirecting user to categories route
        return redirect()->route('jobconnectors');
    }
}
