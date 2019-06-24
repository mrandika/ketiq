<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Storage, File;

use Carbon\Carbon;

use Intervention\Image\ImageManagerStatic as Image;

use App\User;
use App\Membership;

use Auth;

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
     * Show Form to Verify the current user.
     *
     * @return \Illuminate\Http\Response
     */
    public function form()
    {
        //
        return view('v2/blog/admin/membership/verify');
    }

    /**
     * Verify the specified member.
     * 
     * @return \Illuminate\Http\Response
     */
    public function verify(Request $request, $id)
    {
        //
        $validatedData = $request->validate([
            'userImage' => 'required',
            'about' => 'required'
        ]);

        $user = User::find($id);

        $photo = $request->file('userImage');
        $extension = $photo->getClientOriginalExtension();
        $name = Auth::user()->name.'.'.$extension;
        
        $image_resize = Image::make($photo->getRealPath());              
        $image_resize->resize(397, 397);
        $image_resize->save(public_path('uploads/users/' .$name));
        
        $user->photo = $name;
        $user->about = $request->post('about');
        $user->email_verified_at = Carbon::now()->toDateTimeString();

        $user->save();
        return redirect('blog/admin')->with('success', 'Data user telah diverifikasi'); 
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
