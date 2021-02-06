<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\User;
use Session;
use Validator;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index')->with('user', User::find(Auth::user()->id));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit()
    {
        return view('user.edit')->with('user', User::find(Auth::user()->id));
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
            'name' => 'required',
            'photo' => 'image|max:10240'
        ];

        $customMessages = [
            'name.required' => 'Nama harus diisi.',
            'photo.image'   => 'Format foto tidak diizinkan.',
            'photo.max'   => 'Ukuran file lebih dari 10MB.'
        ];

        $this->validate($request, $rules, $customMessages);

        $user = User::find($id);

        $user->name     = $request->name;

        if($request->has('photo')){
            $image = $request->file('photo');

            $fullImage = time().'.'.$image->getClientOriginalExtension();
            
            $path = public_path('/uploads/userphoto/');
            
            $image->move($path, $fullImage);

            $user->photo = $fullImage;
        }
        
        $user->update();
        Session::flash('success', 'Profil Anda Telah Diperbaharui');

        return redirect()->route('participants');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function changepassword(){
        return view('user.changepassword')->with('user', User::find(Auth::user()->id));
    }

    public function updatepassword(Request $request, $id){

        $rules = [
            'password' => 'required',
            'confirmpassword' => 'required|same:password',
        ];

        $customMessages = [
            'password.required'         => 'Password Baru harus diisi.',
            'confirmpassword.required'  => 'Konfirmasi Password Baru harus diisi.',
            'confirmpassword.same'      => 'Konfirmasi Password Baru tidak sesuai.',
        ];

        $this->validate($request, $rules, $customMessages);        

        $user = User::find($id);

        $user->password = bcrypt($request->password);

        $user->update();
        Session::flash('success', 'Password Berhasil Diubah');

        return redirect()->route('participants');
    }
}