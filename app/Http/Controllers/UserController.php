<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Validator;
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

        Validator::extend('without_spaces', function($attr, $value){
            return preg_match('/^\S*$/u', $value);
        });
 
        $rules = [
            'name'            => 'required',
            'username'        => 'required|without_spaces|unique:users',
            'password'        => 'required',
            'confirmpassword' => 'required',
        ];

        $customMessages = [
            'name.required'            => 'Nama harus diisi.',
            'username.required'        => 'Username harus diisi.',
            'password.required'        => 'Password harus diisi.',
            'confirmpassword.required' => 'Konfirmasi Password harus diisi.',
            'username.without_spaces'  => 'Username tidak boleh mengandung spasi.',
            'username.unique'          => 'Username sudah terpakai, silahkan coba lagi.',
        ];

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

        Validator::extend('without_spaces', function($attr, $value){
            return preg_match('/^\S*$/u', $value);
        });

        $rules = [
            'name'            => 'required',
            'username'        => 'required|without_spaces',
        ];

        $customMessages = [
            'name.required'            => 'Nama harus diisi.',
            'username.required'        => 'Username harus diisi.',
            'username.without_spaces'  => 'Username tidak boleh mengandung spasi.',
        ];

        $this->validate($request, $rules, $customMessages);

        $user = User::find($id);

        $user->name     = ucwords($request->name);
        $user->username = $request->username;
        
        if($request->has('password')){
            $user->password = bcrypt($request->password);
        }

        if($request->has('photo')){
            $image = $request->file('photo');

            $fullImage = time().'.'.$image->getClientOriginalExtension();
            
            $path = public_path('/uploads/userphoto/');
            
            $image->move($path, $fullImage);

            $user->photo = $fullImage;
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

        if($user->id == Auth::user()->id){
            Session::flash('warning', 'Tidak dapat menghapus data Anda sendiri.');
            return redirect()->route('users');
        }

        $user->delete();

        Session::flash('success', 'Berhasil Menghapus User');
        return redirect()->route('users');
    }

    public function changerole($id){
        $user = User::find($id);

        if($user->admin == 0){
            $user->admin = 1;
            Session::flash('success', 'Berhasil Menjadikan ' .$user->name. ' sebagai Admin');
        }else{
            $user->admin = 0;
            Session::flash('success', 'Berhasil Menjadikan ' .$user->name. ' sebagai User');
        }

        $user->save();

        return redirect()->back();
    }
}
