<?php

namespace App\Models\Courses;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use App\Models\Programs\Programs;
use App\Models\User;
use Request;

class Courses extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_name',
        'program_id',
        'lecturer_id',
        'material',
    ];

    static public function getCourses()
    {
        $user = Auth::user();
        if($user)
        {
            $return = self::select('courses.*',
                'programs.program_name as program_name',
                'users.name as lecturer_name'
            )
            ->join('programs', 'courses.program_id', '=', 'programs.id')
            ->join('users', 'courses.lecturer_id', '=', 'users.id');
            if(!empty(Request::get('course_name')))
            {
                $return = $return->where('course_name', 'like', '%'.Request::get('course_name').'%');
            }
            if(!empty(Request::get('lecturer')))
            {
                $return = $return->where('users.name', 'like', '%'.Request::get('lecturer') .'%');
            }
            if(!empty(Request::get('date')))
            {
                $return = $return->whereDate('created_at', '=', Request::get('date'));
            }
            $return = $return->orderBy('id', 'desc')
                        ->paginate(10);
            
            return $return;
        }
        else
        {
            return redirect('login');
        }
    }

    static public function getSingleView($id)
    {
        $return = self::select('courses.*',
                'programs.program_name as program_name',
                'users.name as lecturer_name'
            )
            ->join('programs', 'courses.program_id', '=', 'programs.id')
            ->join('users', 'courses.lecturer_id', '=', 'users.id');
        $return = $return->where('courses.id', '=', $id)->first();

        return $return;
    }

    static public function getSingleCourse($id)
    {
        $return = self::select('courses.*',
        'programs.program_name as program_name',
        'users.name as lecturer_name'
        )
        ->join('programs', 'courses.program_id', '=', 'programs.id')
        ->join('users', 'courses.lecturer_id', '=', 'users.id');
        
        $return = $return->where('courses.id', '=', $id)->first();

        return $return;
    }

    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function courseList()
    {
        $return = self::select('courses.*',
            'programs.program_name as program_name',
            'users.name as lecturer_name'
        )
        ->join('programs', 'courses.program_id', '=', 'programs.id')
        ->join('users', 'courses.lecturer_id', '=', 'users.id')
        ->get();
            
        return $return;
    }
}
