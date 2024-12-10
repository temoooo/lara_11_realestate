<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use Str;

class AdminController extends Controller
{
    public function AdminDashboard(Request $request)
    {
        return view('admin.admin_dashboard');
    }

    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();  
        return redirect('admin/login');
    }

    public function AdminIndex(Request $request)
    {
       return view('admin.index');
    }

    public function AdminLogin(Request $request)
    {
       return view('admin.admin_login');
    }
    public function AdminProfile(Request $request)
    {
        $data['getRecord']=User::find(Auth::user()->id);
       return view('admin.admin_profile',$data);
    }

    public function admin_users(Request $request)
    {
        $data['getRecord']=User::getRecord();
        return view('admin.users.list',$data);
    }

    public function AdminProfileUpdate(Request $request)
    {
        //  dd($request->all( ));

        $user=$request->validate([
            'email' => 'required|unique:users,email,'.Auth::user()->id
            
        ]);

        $user=User::find(Auth::user()->id);
        $user->name=$request->name;
        $user->username=$request->username;
        $user->email=$request->email;
        $user->address=$request->address;
        $user->about=$request->about;
        $user->website=$request->website;
        // $user->photo=$request->photo;
        if(!empty($request->password)){
            $user->password=Hash::make($request->password);

        }
        if(!empty($request->file('photo'))){
           $file=$request->file('photo');
           $randomStr =Str::random(30);
           $filename=$randomStr .'.'.$file->getClientOriginalExtension();
           $file->move('upload/' ,$filename);
           $user->photo=$filename;
        }
        // $filename = time() . '_' . $file->getClientOriginalName();
     
       $user->save();
       return redirect('admin/profile')->with('success','Profile Update Successfully ...');
    }
  

    public function AdminRead(Request $request)
    {
       return view('admin.read');
    }
    public function AdminCompose(Request $request)
    {
       return view('admin.compose');
    }
}
