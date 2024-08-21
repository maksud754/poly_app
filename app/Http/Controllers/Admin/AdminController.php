<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class AdminController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::getAdmin();
        $data['header_title'] = "Admin List";

        return view('admin.admin.list', $data);
    }

    public function add()
    {
        $data['header_title'] = "Add New Admin";
        return view('admin.admin.add', $data);
    }

    public function insert(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'staff_id' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'profile_picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if($request->hasFile('profile_picture'))
        {
            $imageName = time().'.'.$request->profile_picture->extension();
            $request->profile_picture->move(public_path('profile_pictures'), $imageName);
        }
        else 
        {
            $imageName = null;
        }
        
        $user = new User();
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->unique_id = trim($request->staff_id);
        $user->password = Hash::make($request->password);
        $user->profile_picture = 'profile_pictures/'.$imageName;
        $user->user_type = 1;
        $user->save();
        return redirect('admin/admin/list')->with('success', 'Admin created successfully.');
    }

    public function delete($id) {
        $user = User::getSingle($id);
        $user->is_deleted = 1;
        $user->save();

        return redirect('admin/admin/list')->with('success', "Admin successfully deleted");
    }

    public function viewProfile()
    {
        $data['getRecord'] = User::currentUser();
        $data['header_title'] = "My Account";

        return view('admin.profile', $data);
    }

    public function editProfile($id)
    {
        $user_data = User::getSingle($id);

        if(!empty($user_data))
        {
            //echo "<pre>"; print_r($user_data);die;
            $data['getRecord'] = $user_data;
            $data['header_title'] = "Edit Profile";
            return view('admin.editProfile', $data);
        }
        else
        {
            abort(404);
        }
    }

    public function updateProfile($id, Request $request)
    {
        $user = User::getSingle($id);
        $oldPass = $user->password;
        if(!empty($request->profile_picture))
        {
            $imageName = time().'.'.$request->profile_picture->extension();
            $request->profile_picture->move(public_path('profile_pictures'), $imageName);
            $user->profile_picture = 'profile_pictures/'.$imageName;
        }
        else 
        {
            $imageName = $user->profile_picture;
            $user->profile_picture = $imageName;
        }
        
        $user->name = trim($request->name);
        if(!empty($request->password))
        {
            $user->password = Hash::make($request->password);
        }
        else {
            $user->password = $oldPass;
        }
        $user->save();
        return redirect('admin/profile')->with('success', 'Profile updated successfully.');
    }
}
