<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Courses\Courses;
use Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $data['header_title'] = 'Dashboard';
        
        if(Auth::user()->user_type == 1)
        {
            $admins = User::getAdmin();
            $data['admins'] = $admins->count();

            $lecturers = User::getLecturer();
            $data['lecturers'] = $lecturers->count();

            $students = User::getStudent();
            $data['students'] = $students->count();

            $courses = Courses::courseList();
            $data['courses'] = $courses->count();

            return view('admin.dashboard', $data);
        }
        else if(Auth::user()->user_type == 2)
        {
            return view('lecturer.dashboard', $data);
        }
        else if(Auth::user()->user_type == 3)
        {
            return view('student.dashboard', $data);
        }
    }
}
