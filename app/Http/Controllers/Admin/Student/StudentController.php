<?php

namespace App\Http\Controllers\Admin\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Programs\Programs;
use Hash;

class StudentController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::getStudent();
        $data['header_title'] = "Student List";
        return view('admin.student.list', $data);
    }

    public function add()
    {
        $data['programs'] = Programs::programList();
        $data['header_title'] = "Add New Student";
        return view('admin.student.add', $data);
    }

    public function insert(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'matric_no' => 'required|string|max:255',
            'program' => 'required|string|max:255',
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
        $user->unique_id = trim($request->matric_no);
        $user->std_program = $request->program;
        $user->password = Hash::make($request->password);
        $user->profile_picture = 'profile_pictures/'.$imageName;
        $user->user_type = 3;
        $user->save();
        return redirect('admin/student/list')->with('success', 'Student created successfully.');
    }

    public function edit($id)
    {
        $data['getRecord'] = User::getSingleStudent($id);
        if(!empty($data['getRecord']))
        {
            $data['programs'] = Programs::programList();
            $data['header_title'] = "Edit Student";
            return view('admin.student.edit', $data);
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
        $user->std_program = $request->program;
        if(!empty($request->password))
        {
            $user->password = Hash::make($request->password);
        }
        else {
            $user->password = $oldPass;
        }
        $user->save();
        return redirect('admin/student/list')->with('success', 'Student updated successfully.');
    }

    public function delete($id)
    {
        $user = User::getSingle($id);
        $user->is_deleted = 1;
        $user->save();

        return redirect('admin/student/list')->with('success', "Student successfully deleted");
    }
}
