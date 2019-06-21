<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\User;
use App\Membership;

class MembershipController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        return view('v2/blog/admin/membership/membership', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $memberships = Membership::all();
        return view('v2/blog/admin/membership/create', compact('memberships'));
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
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'membership' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed',
        ]);

        $user = new User;
        $password = Hash::make($request->get('password'));
        $user->name = $request->get('name');
        $user->membership = $request->get('membership');
        $user->email = $request->get('email');
        $user->password = $password;
        $user->save();

        return redirect('blog/admin/panel/membership')->with('success', 'Data user telah ditambahkan'); 
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
        $user = User::find($id);
        $memberships = Membership::all();
        return view('v2/blog/admin/membership/edit',compact('user', 'memberships'));  
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
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'membership' => 'required',
            'email' => 'required',
            'oldpassword' => 'required',
        ]);

        $user = User::find($id);
        $user->name = $request->get('name');
        $user->membership = $request->get('membership');
        $user->email = $request->get('email');

        if ($request->get('password') != null) {
            if ($request->get('confirmpassword') == $request->get('password')) {
                $password = Hash::make($request->get('password'));
                $user->password = $password;
            } else {
                return redirect('blog/admin/panel/membership')->with('error', 'Password Confirmation doesnt match.');
            }
        }

        $user->save();

        return redirect('blog/admin/panel/membership')->with('success', 'Data user telah diubah'); 

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
        $user = User::find($id);
        $user->delete();
        return redirect('blog/admin/panel/membership')->with('success','Data user telah di hapus');
    }
}
