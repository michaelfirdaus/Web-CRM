<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Branch;
use Session;
use DataTables;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Get all branches
        $branches = Branch::all();

        //DataTables server-side rendering
        if($request->ajax()){
            return DataTables::of($branches)
                ->editColumn('code', function($branches){
                    return "<div class='text-center'>".$branches->code."</div>";
                })
                ->editColumn('status', function($branches){
                    if($branches->status == 1){
                        return "<div class='text-center'>Aktif</div>";
                    }else{
                        return "<div class='text-center'>Tidak Aktif</div>";
                    }
                })
                ->addColumn('Edit', function($branches){
                    return 
                    "<div class='text-center'>
                        <a href='".route('branch.edit', ['id' => $branches ->id])."' class='btn btn-xs btn-info'>
                            <span class='fas fa-pencil-alt'></span>
                        </a>
                    </div>";
                })
                ->rawColumns(['code', 'status', 'Edit'])
                ->make();
        }
        //Return branch index view
        return view('branch.index')->with('branches', Branch::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Return branch create view
        return view('branch.create');
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
            'name'   => 'required',
            'code'   => 'required|numeric|unique:branches',
            'status' => 'required|boolean'
        ];

        //Custom validation message
        $customMessages = [
            'name.required'   => 'Nama Cabang harus diisi.',
            'code.required'   => 'Kode Cabang harus diisi.',
            'code.unique'     => 'Kode Cabang sudah terdaftar, silahkan coba lagi.',
            'code.numeric'    => 'Kode Cabang harus angka.',
            'status.required' => 'Status Cabang harus dipilih.'
        ];

        $this->validate($request, $rules, $customMessages);

        $branch = new Branch;

        $branch->name   = ucwords($request->name);
        $branch->code   = $request->code;
        $branch->status = $request->status;
        //Save current branch
        $branch->save();

        //Notify user with pop up message
        Session::flash('success', 'Berhasil Menambahkan Cabang');

        //Redirecting user to branches route
        return redirect()->route('branches');
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
        //Find branch based on branch ID
        $branch = Branch::find($id);

        //Redirecting user to branch edit view
        return view('branch.edit')->with('branch', $branch); 
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
            'code'   => 'required|numeric',
            'status' => 'required|boolean'
        ];

        //Custom validation message
        $customMessages = [
            'name.required'   => 'Nama Cabang harus diisi.',
            'code.required'   => 'Kode Cabang harus diisi.',
            'code.unique'     => 'Kode Cabang sudah terdaftar, silahkan coba lagi.',
            'code.numeric'    => 'Kode Cabang harus angka.',
            'status.required' => 'Status Cabang harus dipilih.'
        ];

        $this->validate($request, $rules, $customMessages);

        //Find branch
        $branch = Branch::find($id);
        
        $branch->name   = ucwords($request->name);
        $branch->code   = $request->code;
        $branch->status = $request->status;
        
        //Save current branch
        $branch->save();

        //Notify user with pop up message
        Session::flash('success', 'Berhasil Memperbaharui Cabang');

        //Redirecting user to branches route
        return redirect()->route('branches');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Find branch
        $branch = Branch::find($id);

        //Delete branch
        $branch->delete();

        //Notify user with pop up message
        Session::flash('success', 'Berhasil Menghapus Cabang');

        //Redirecting user to branches route
        return redirect()->route('branches');
    }
}
