<?php

namespace App\Http\Controllers\Admin\Courses;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courses\Courses;
use App\Models\Programs\Programs;
use App\Models\User;

class CourseController extends Controller
{
    public function list()
    {
        $data['getRecord'] = Courses::getCourses();
        $data['header_title'] = "Course List";
        return view('admin.courses.list', $data);
    }

    public function view($id)
    {
        $data['getRecord'] = Courses::getSingleView($id);
        if(!empty($data['getRecord']))
        {
            $data['header_title'] = "Course Detail";
            return view('admin.courses.view', $data);
        }
    }

    public function add()
    {
        $data['programs'] = Programs::programList();
        $data['lecturers'] = User::getLecturer();
        $data['header_title'] = "Add New Course";
        return view('admin.courses.add', $data);
    }

    public function insert(Request $request)
    {
        $request->validate([
            'material' => 'required|mimes:pdf,doc,docx|max:10240',
        ]);

        if($request->hasFile('material'))
        {
            $material = time().'.'.$request->material->extension();
            $request->material->move(public_path('materials/courses/attachments'), $material);
        }
        
        $course = new Courses();
        $course->course_name = trim($request->name);
        $course->program_id = trim($request->program);
        $course->lecturer_id = trim($request->lecturer);
        $course->material= 'materials/courses/attachments/'.$material;
        $course->save();
        return redirect('admin/courses/list')->with('success', 'Course created successfully.');
    }

    public function edit($id) 
    {
        $data['programs'] = Programs::programList();
        $data['lecturers'] = User::getLecturer();
        $data['getRecord'] = Courses::getSingleCourse($id);
        if(!empty($data['getRecord']))
        {
            $data['header_title'] = "Edit Course";
            return view('admin.courses.edit', $data);
        }
        else
        {
            abort(404);
        }
        
    }

    public function update($id, Request $request)
    {
        $course = Courses::getSingle($id);

        if($request->hasFile('material'))
        {
            $material = time().'.'.$request->material->extension();
            $request->material->move(public_path('materials/courses/attachments'), $material);
            $course->material= 'materials/courses/attachments/'.$material;
        }

        else
        {
            $material = $course->material;
        }
        
        $course->course_name = trim($request->name);
        $course->program_id = trim($request->program);
        $course->lecturer_id = trim($request->lecturer);
        $course->save();
        return redirect('admin/courses/view/'.$id)->with('success', 'Course updated successfully.');
    }

    public function delete($id) {
        $course = Courses::getSingle($id);
    
        if(!empty($course))
        {
            $course->delete();
            return redirect('admin/courses/list')->with('success', "Course successfully deleted");
        }
        else
        {
            abort(404);
        }
    }
}
