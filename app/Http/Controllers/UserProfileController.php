<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\User;
use Session;
use Validator;
use Hash;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Redirecting user to user index view
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
        //Redirecting user to user edit view
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
        //Input validation
        $rules = [
            'name' => 'required',
            'photo' => 'image|max:10240'
        ];

        //Custom validation message
        $customMessages = [
            'name.required' => 'Nama harus diisi.',
            'photo.image'   => 'Format foto tidak diizinkan.',
            'photo.max'   => 'Ukuran file lebih dari 10MB.'
        ];

        $this->validate($request, $rules, $customMessages);
        //Get user by id
        $user = User::find($id);

        $user->name     = $request->name;

        //Check if user uploaded photo
        if($request->has('photo')){
            $image = $request->file('photo');

            $fullImage = time().'.'.$image->getClientOriginalExtension();
            
            $path = public_path('/uploads/userphoto/');
            
            $image->move($path, $fullImage);

            $user->photo = $fullImage;
        }
        //Update user
        $user->update();
        //Notify user with pop up message
        Session::flash('success', 'Profil Anda Telah Diperbaharui');
        //Redirecting user to participants route
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
        //Redirecting user to user changepassword view
        return view('user.changepassword')->with('user', User::find(Auth::user()->id));
    }

    public function updatepassword(Request $request, $id){
        //Input validation
        $rules = [
            'password' => 'required|different:old_password',
            'confirmpassword' => 'required|same:password|different:old_password',
        ];

        //Custom validation message
        $customMessages = [
            'password.different'        => 'Password Baru tidak boleh sama dengan Password Lama.',
            'password.required'         => 'Password Baru harus diisi.',
            'confirmpassword.required'  => 'Konfirmasi Password Baru harus diisi.',
            'confirmpassword.different' => 'Konfirmasi Password Baru tidak boleh sama dengan Password Lama.',
            'confirmpassword.same'      => 'Konfirmasi Password Baru tidak sesuai.',
        ];

        $this->validate($request, $rules, $customMessages);        
  
        //Get user by id
        $user = User::find($id);

        if(!Hash::check($request->old_password, $user->password)){
            Session::flash('warning', 'Password Lama salah!');
            return redirect()->back();
        }

        $user->password = bcrypt($request->password);
        //Update user
        $user->update();

        //Notify user with pop up message
        Session::flash('success', 'Password Berhasil Diubah');

        //Redirecting user to participants route
        return redirect()->route('participants');
    }
}