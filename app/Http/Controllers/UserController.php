<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Auth;
use Hash;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createUserData()
    {
        if(auth()->check()){
            return redirect()->route('contribute.text');
        }
        return view('frontPages.register')
                    ->with('title', 'Contributor Informaton');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeUserData(Request $request)
    {
        if($request->has('anonymous')) {
            $user = User::where('username', 'anonymous')->first();
            Auth::login($user);

            return redirect()->route('contribute.text')
                            ->with('info','Anonymously logged in.');
 
        } else {
            $rules =[
                'name'                  => 'required',
                'email'                 => 'required|unique:users,email',
            ];
            $data = $request->all();

            $validation = Validator::make($data,$rules);

            if($validation->fails()){
                return redirect()->back()->withErrors($validation)->withInput();
            }

            $user = new User;
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = Hash::make(1234);

            if($user->save()){
                Auth::login($user);
                return redirect()->route('contribute.text')
                            ->with('success','Registered successfully. Now You can always login with password 1234');
            }else{
                return redirect()->back()
                            ->with('error',"Something went wrong.Please Try again.");
            }
        }
    }

    /**
     * Display the profile Info.
     *
     * @param  none
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
         return view('auth.profile')
                    ->with('title', 'Profile')->with('user', Auth::user());
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
        //
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
        //
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
}
