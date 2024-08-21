<?php

namespace App\Http\Controllers\Admin\Programs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Programs\Programs;

class ProgramController extends Controller
{
    public function list()
    {   
        $data['getRecord'] = Programs::getPrograms();
        $data['header_title'] = "Programs List";
        return view('admin.programs.list', $data);
    }

    public function viewDetail($id)
    {
        $data['getRecord'] = Programs::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['header_title'] = "Program Detail";
            return view('admin.programs.viewDetail', $data);
        }
    }

    public function add()
    {
        $data['header_title'] = "Add New Program";
        return view('admin.programs.add', $data);
    }

    public function insert(Request $request)
    {
        $program = new Programs();
        $program->program_name = trim($request->program_name);
        $program->description = trim($request->program_detail);
        
        $program->save();
        return redirect('admin/programs/list')->with('success', 'Program added successfully.');
    }

    public function edit($id) 
    {
        $data['getRecord'] = Programs::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['header_title'] = "Edit Program";
            return view('admin.programs.edit', $data);
        }
        else
        {
            abort(404);
        }
    }

    public function update($id, Request $request)
    {
        $program = Programs::getSingle($id);
        
        $program->program_name = trim($request->program_name);
        $program->description = trim($request->program_name);
        
        $program->save();
        return redirect('admin/programs/list')->with('success', 'Program updated successfully.');
    }

    public function delete($id) {
        $program = Programs::getSingle($id);
    
        if(!empty($id))
        {
            $id->delete();
            return redirect('admin/programs/list')->with('success', "Program successfully deleted");
        }
        else
        {
            abort(404);
        }

        
    }
}
