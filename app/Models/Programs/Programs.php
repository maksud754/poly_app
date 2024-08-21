<?php

namespace App\Models\Programs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Request;

class Programs extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_name',
        'description',
    ];

    static public function getPrograms()
    {
        $user = Auth::user();
        if($user)
        {
            $return = self::select('programs.*');
            if(!empty(Request::get('id')))
            {
                $return = $return->where('id', '=' ,Request::get('id'));
            }
            if(!empty(Request::get('program_name')))
            {
                $return = $return->where('program_name', 'like', '%'.Request::get('program_name') .'%');
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

    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function programList()
    {
        $return = self::select('programs.*')
                ->get();
        
        return $return;
    }
}
