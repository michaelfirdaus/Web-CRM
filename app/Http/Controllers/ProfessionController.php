<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Profession;
use Session;
use DataTables;

class ProfessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Get all professions
        $professions = Profession::all();

        //DataTables server-side rendering
        if($request->ajax()){
            return DataTables::of($professions)
            ->editColumn('status', function($professions){
                if($professions->status == 1){
                    return "<div class='text-center'>Aktif</div>";
                }else{
                    return "<div class='text-center'>Tidak Aktif</div>";
                }
            })
            ->addColumn('Edit', function($professions){
                return
                "<div class='text-center'>
                    <a href='".route('profession.edit', ['id' => $professions ->id])."' class='btn btn-xs btn-info'>
                        <span class='fas fa-pencil-alt'></span>
                    </a>
                </div>";
            })
            ->rawColumns(['status', 'Edit'])
            ->make();
        }
        //Redirecting user to profession index view
        return view('profession.index')->with('professions', $professions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Redirecting user to profession create view
        return view('profession.create');
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
            'name'   => 'required|unique:professions',
            'status' => 'required'
        ];
        //Custom validation message
        $customMessages = [
            'name.required'   => 'Nama Profesi harus diisi.',
            'name.unique'     => 'Nama Profesi sudah terdaftar, silahkan coba lagi.',
            'status.required' => 'Status harus dipilih.'
        ];

        $this->validate($request, $rules, $customMessages);

        $profession = new Profession;

        $profession->name   = ucwords($request->name);
        $profession->status = $request->status;
        //Save current profession
        $profession->save();
        //Notify user with pop up message
        Session::flash('success', 'Berhasil Menambahkan Profesi Baru');
        //Redirecting user to professions route
        return redirect()->route('professions');

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
        //Get profession by id
        $profession = Profession::find($id);
        //Redirecting user to profession edit view
        return view('profession.edit')->with('profession', $profession);
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
            'name.required'   => 'Nama Profesi harus diisi.',
            'status.required' => 'Status harus dipilih.'
        ];

        $this->validate($request, $rules, $customMessages);
        //Get profession by id
        $profession = Profession::find($id);

        $profession->name   = ucwords($request->name);
        $profession->status = $request->status;
        //Save current profession
        $profession->save();
        //Notify user with pop up message
        Session::flash('success', 'Berhasil Memperbaharui Profesi');
        //Redirecting user to professions route
        return redirect()->route('professions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Get profession by id
        $profession = Profession::find($id);
        //Delete profession
        $profession->delete();
        //Notify user with pop up message
        Session::flash('success', 'Berhasil Menghapus Profesi');
        //Redirecting user to professions route
        return redirect()->route('professions');
    }
}
