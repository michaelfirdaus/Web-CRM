<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Session;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.index')->with('users', User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required',
            'username'  => 'required',
            'password'  => 'required',
        ]);

        $user = User::create([
            'name'      => $request->name,
            'username'  => $request->username,
            'password'  => bcrypt($request->password),
        ]);

        Session::flash('success', 'Berhasil Menambahkan User');

        return redirect()->route('users');
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
        $user = User::find($id);

        return view('admin.user.edit')->with('user', $user);
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
        $this->validate($request, [
            'username' => 'required',
            'name' => 'required',
        ]);

        $user = User::find($id);

        $user->name     = $request->name;
        $user->username = $request->username;
        
        if($request->has('password')){
            $user->password = bcrypt($request->password);
        }
        
        $user->save();
        Session::flash('success', 'Berhasil Memperbaharui User');

        return redirect()->route('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        Session::flash('success', 'Berhasil Menghapus User');
        return redirect()->route('users');
    }

    public function changerole($id){
        $user = User::find($id);

        if($user->admin == 0){
            $user->admin = 1;
            Session::flash('success', 'Berhasil Menjadikan Admin');
        }else{
            $user->admin = 0;
            Session::flash('success', 'Berhasil Menjadikan User');
        }

        $user->save();

        return redirect()->back();
    }
}
