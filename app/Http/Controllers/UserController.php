<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Validator;
use App\User;
use Session;

class UserController extends Controller
{
    //This page only accessible by admin
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
        //Redirecting user to admin user index view
        return view('admin.user.index')->with('users', User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Redirecting user to admin user create view
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
        //Custom validator to check no spaces
        Validator::extend('without_spaces', function($attr, $value){
            return preg_match('/^\S*$/u', $value);
        });
 
        //Input validation
        $rules = [
            'name'            => 'required',
            'username'        => 'required|without_spaces|unique:users',
            'password'        => 'required',
            'confirmpassword' => 'required',
        ];

        //Custom validation message
        $customMessages = [
            'name.required'            => 'Nama harus diisi.',
            'username.required'        => 'Username harus diisi.',
            'password.required'        => 'Password harus diisi.',
            'confirmpassword.required' => 'Konfirmasi Password harus diisi.',
            'username.without_spaces'  => 'Username tidak boleh mengandung spasi.',
            'username.unique'          => 'Username sudah terpakai, silahkan coba lagi.',
        ];

        //Check if user uploaded photo
        if($request->has('photo')){
            $this->validate($request, $rules, $customMessages);
                
            $image = $request->file('photo');
    
            $fullImage = time().'.'.$image->getClientOriginalExtension();
            
            $path = public_path('/uploads/userphoto/');
            
            $image->move($path, $fullImage);
    
            $user = User::create([
                'name'      => ucwords($request->name),
                'username'  => $request->username,
                'password'  => bcrypt($request->password),
                'photo'     => $fullImage,
            ]);
        }

        else{
            $user = User::create([
                'name'      => ucwords($request->name),
                'username'  => $request->username,
                'password'  => bcrypt($request->password),
                'photo'     => 'logo-cn.png',
            ]);
        }

        //Notify user with pop up message
        Session::flash('success', 'Berhasil Menambahkan User');

        //Redirecting user to users route
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
        //Get user by id
        $user = User::find($id);

        //Redirecting user to admin user edit view
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
        //Custom validator to check no spaces
        Validator::extend('without_spaces', function($attr, $value){
            return preg_match('/^\S*$/u', $value);
        });

        //Input validation
        $rules = [
            'name'            => 'required',
            'username'        => 'required|without_spaces',
        ];

        //Custom validation message
        $customMessages = [
            'name.required'            => 'Nama harus diisi.',
            'username.required'        => 'Username harus diisi.',
            'username.without_spaces'  => 'Username tidak boleh mengandung spasi.',
        ];

        $this->validate($request, $rules, $customMessages);

        //Get user by id
        $user = User::find($id);

        $user->name     = ucwords($request->name);
        $user->username = $request->username;
        
        //Check if user change password
        if($request->has('password')){
            $user->password = bcrypt($request->password);
        }

        //Check if user uploaded photo
        if($request->has('photo')){
            $image = $request->file('photo');

            $fullImage = time().'.'.$image->getClientOriginalExtension();
            
            $path = public_path('/uploads/userphoto/');
            
            $image->move($path, $fullImage);

            $user->photo = $fullImage;
        }
        
        //Save current user
        $user->save();
        //Notify user with pop up message
        Session::flash('success', 'Berhasil Memperbaharui User');
        //Redirecting user to users route
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
        //Get user by id
        $user = User::find($id);

        //Check if user not delete himself
        if($user->id == Auth::user()->id){
            Session::flash('warning', 'Tidak dapat menghapus data Anda sendiri.');
            return redirect()->route('users');
        }

        //Delete user
        $user->delete();
        //Notify user with pop up message
        Session::flash('success', 'Berhasil Menghapus User');
        //Redirecting user to users route
        return redirect()->route('users');
    }

    public function changerole($id){
        //Get user by id
        $user = User::find($id);

        //Check if user admin, then set to not admin and vice versa
        if($user->admin == 0){
            $user->admin = 1;
            Session::flash('success', 'Berhasil Menjadikan ' .$user->name. ' sebagai Admin');
        }else{
            $user->admin = 0;
            Session::flash('success', 'Berhasil Menjadikan ' .$user->name. ' sebagai User');
        }

        //Save current user
        $user->save();

        //Redirecting user back
        return redirect()->back();
    }
}
