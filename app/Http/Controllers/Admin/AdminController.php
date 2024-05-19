<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function AdminDashboard(){

        return view('admin.index');

    }// End Methods

    public function AdminProfile(){

        $id= Auth::guard('admin')->user()->id;
        $profileData= Admin::findOrFail($id);

        return view('admin.pages.profile.admin_profile',compact('profileData'));

    }// End Methods

    public function UpdateAdminProfile(Request $request){

        $id= Auth::guard('admin')->user()->id;
        $update= Admin::findOrFail($id);

        $update->name = $request->name;
        $update->company_name = $request->company_name;
        $update->email = $request->email;
        $update->phone = $request->phone;
        $update->address = $request->address;
        $update->designation = $request->designation;
        $update->biometric_id = $request->biometric_id;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/' . $update->photo));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images/'), $filename);
            $update['photo'] = $filename;
        }

        $update->save();


        return redirect()->back()->with('success','Your account has been updated!');

    }// end methods

    public function AdminPassword(){
        return view('admin.pages.profile.admin_password');
    }// End Methods

    public function UpdateAdminPassword(Request $request){

        //validate
        $request->validate([

            'old_password' => 'required',
            'new_password' => [

                'required', 'confirmed', Rules\Password::min(8)->mixedCase()->symbols()->letters()->numbers(),

            ],
        ]);

        //Match Old Password
        if (!Hash::check($request->old_password, Auth::guard('admin')->user()->password)) {

            return redirect()->back()->with('error','Old Password Not Match!');
        }

        //Update New Password
        Admin::whereId(Auth::guard('admin')->user()->id)->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect()->back()->with('success','Password Change Succeesfully!');

    }// end methods

}
