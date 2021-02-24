<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Programcategory;
use Session;
use DataTables;

class ProgramcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Get all programcategories
        $programcategories = Programcategory::all();

        //DataTables server-side rendering
        if($request->ajax()){
            return DataTables::of($programcategories)
                ->editColumn('status', function($programcategories){
                    if($programcategories->status == 1){
                        return "<div class='text-center'>Aktif</div>";
                    }else{
                        return "<div class='text-center'>Tidak Aktif</div>";
                    }
                })
                ->addColumn('Edit', function($programcategories){
                    return 
                    "<div class='text-center'>
                        <a href='".route('programcategory.edit', ['id' => $programcategories ->id])."' class='btn btn-xs btn-info'>
                            <span class='fas fa-pencil-alt'></span>
                        </a>
                    </div>";
                })
                ->rawColumns(['status', 'Edit'])
                ->make();
        }
        //Redirecting user to programcategory index view
        return view('programcategory.index')
               ->with('programcategories', $programcategories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Redirecting user to programcategory create view
        return view('programcategory.create');
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
            'name'   => 'required|unique:programcategories',
            'status' => 'required|boolean'
        ];
        //Custom validation message
        $customMessages = [
            'name.required'   => 'Nama Kategori Program harus diisi.',
            'name.unique'     => 'Nama Kategori Program sudah terdaftar, silahkan coba lagi.',
            'status.required' => 'Status Kategori Program harus dipilih.',
        ];

        $this->validate($request, $rules, $customMessages);
        //Create programcategory
        $programcategory = Programcategory::create([
            'name'   => ucwords($request->name),
            'status' => $request->status  
        ]);
        //Notify user with pop up message
        Session::flash('success', 'Berhasil Menambahkan Kategori Program');
        //Redirecting user to programcategories
        return redirect()->route('programcategories');
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
        //Get programcategory by id
        $programcategory = Programcategory::find($id);
        //Redirecting user to programcategory edit view
        return view('programcategory.edit')->with('programcategory', $programcategory);
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
            'name.required'   => 'Nama Kategori Program harus diisi.',
            'status.required' => 'Status Kategori Program harus dipilih.'
        ];

        $this->validate($request, $rules, $customMessages);
        //Get programcategory by id
        $programcategory = Programcategory::find($id);

        $programcategory->id        = $request->id;
        $programcategory->name      = ucwords($request->name);
        $programcategory->status    = $request->status;
        //Save current programcategory
        $programcategory->save();
        //Notify user with pop up message
        Session::flash('success', 'Berhasil Memperbaharui Kategori Program');
        //Redirecting user to programcategories route
        return redirect()->route('programcategories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Get programcategory by id
        $programcategory = Programcategory::find($id);
        //Delete programcategory
        $programcategory->delete();

        //Notify user with pop up message
        Session::flash('success', 'Berhasil Menghapus Kategori Program');
        //Redirecting use to programcategories route
        return redirect()->route('programcategories');
    }
}
