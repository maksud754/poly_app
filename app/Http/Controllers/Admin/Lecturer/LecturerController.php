<?php

namespace App\Http\Controllers\Admin\Lecturer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class LecturerController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::getLecturer();
        $data['header_title'] = "Lecturer List";

        return view('admin.lecturer.list', $data);
    }

    public function add()
    {
        $data['header_title'] = "Add New Lecturer";
        
        return view('admin.lecturer.add', $data);
    }

    public function insert(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'profile_picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming max file size is 2MB
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
        $user->password = Hash::make($request->password);
        $user->profile_picture = 'profile_pictures/'.$imageName;
        $user->user_type = 2;
        $user->save();
        return redirect('admin/lecturer/list')->with('success', 'Lecturer created successfully.');
    }

    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['header_title'] = "Edit Lecturer";
            return view('admin.lecturer.edit', $data);
        }
        else
        {
            abort(404);
        }
    }

    public function update($id, Request $request)
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
        $user->email = trim($request->email);
        if(!empty($request->password))
        {
            $user->password = Hash::make($request->password);
        }
        else {
            $user->password = $oldPass;
        }
        $user->save();
        return redirect('admin/lecturer/list')->with('success', 'Lecturer updated successfully.');
    }

    public function delete($id) {
        $user = User::getSingle($id);
        $user->is_deleted = 1;
        $user->save();

        return redirect('admin/lecturer/list')->with('success', "Lecturer successfully deleted");
    }
}
