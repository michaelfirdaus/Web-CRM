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
        $programcategories = Programcategory::all();

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
        $rules = [
            'name'   => 'required|unique:programcategories',
            'status' => 'required|boolean'
        ];

        $customMessages = [
            'name.required'   => 'Nama Kategori Program harus diisi.',
            'name.unique'     => 'Nama Kategori Program sudah terdaftar, silahkan coba lagi.',
            'status.required' => 'Status Kategori Program harus dipilih.',
        ];

        $this->validate($request, $rules, $customMessages);

        $programcategory = Programcategory::create([
            'name'   => ucwords($request->name),
            'status' => $request->status  
        ]);

        Session::flash('success', 'Berhasil Menambahkan Kategori Program');

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
        $programcategory = Programcategory::find($id);

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
        $rules = [
            'name'   => 'required',
            'status' => 'required|boolean'
        ];

        $customMessages = [
            'name.required'   => 'Nama Kategori Program harus diisi.',
            'status.required' => 'Status Kategori Program harus dipilih.'
        ];

        $this->validate($request, $rules, $customMessages);

        $programcategory = Programcategory::find($id);

        $programcategory->id        = $request->id;
        $programcategory->name      = ucwords($request->name);
        $programcategory->status    = $request->status;

        $programcategory->save();

        Session::flash('success', 'Berhasil Memperbaharui Kategori Program');

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
        $programcategory = Programcategory::find($id);

        $programcategory->delete();


        Session::flash('success', 'Berhasil Menghapus Kategori Program');
        return redirect()->route('programcategories');
    }
}
