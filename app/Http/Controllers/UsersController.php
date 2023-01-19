<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
use App\Models\Doctor;
use App\Models\User;

use App\Models\UserDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = array();
        $user = Auth::user();
        $doctor = User::where('type','doctor')->get();
        $doctorData = Doctor::all();
        //return today appointment together with a user data
        $date = now()->format('n/j/Y');
        $appointment = Appointments::where('status','upcoming')->where('date',$date)->first();
        //collect user data and all doctor details
        foreach($doctorData as $data)
        {
            foreach($doctor as $info){
                if($data['doc_id']==$info['id']){
                    $data['doctor_name']=$info['name'];
                    $data['doctor_profile']=$info['profile_photo_url'];
                    if(isset($appointment) && $appointment['doc_id']==$info['id']){
                        $data['appointments']=$appointment;
                    }
                }
            }
        }
        $user['doctor']=$doctorData;
        return $user; // return all data
    }

    /**
     * Login
     *
     * @return \Illuminate\Http\Response
     */
    public function Login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages(['email' => ['Login incorreto!'],]);
        }

        return $user->createToken($request->email)->plainTextToken;
    }

    /**
     * Register
     *
     * @return \Illuminate\Http\Response
     */
    public function Register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'type' => 'user',
            'password' => Hash::make($request->password),
        ]);
        $userInfo = UserDetails::create([
            'user_id' => $user->id,
            'status' => 'active'
        ]);
        return $user;
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
