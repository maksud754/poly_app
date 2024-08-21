<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Request;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'unique_id',
        'password',
        'profile_picture',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getEmailSingle($email)
    {
        return User::where('email', '=', $email)->first();
    }

    static public function getTokenSingle($remember_token)
    {
        return User::where('remember_token', '=', $remember_token)->first();
    }

    static public function getAdmin()
    {
        $currentUserId = Auth::id();

        $return = self::select('users.*')
                    ->where('id', '!=', $currentUserId)
                    ->where('user_type', '=', 1)
                    ->where('is_deleted', '!=', '1');
                    if(!empty(Request::get('name')))
                    {
                        $return = $return->where('name', 'like' , '%'.Request::get('name').'%');
                    }
                    if(!empty(Request::get('email')))
                    {
                        $return = $return->where('email', 'like', '%'.Request::get('email').'%');
                    }
                    if(!empty(Request::get('date')))
                    {
                        $return = $return->whereDate('created_at', '=', Request::get('date'));
                    }
        $return = $return->orderBy('id', 'desc')
                    ->paginate(10);
        
        return $return;
    }

    static public function getLecturer()
    {
        $return  = self::select('users.*')
                    ->where('user_type','=',2)
                    ->where('is_deleted','!=','1');
                    if(!empty(Request::get('name')))
                    {
                        $return = $return->where('name', 'like', '%'.Request::get('name') .'%');
                    }
                    if(!empty(Request::get('email')))
                    {
                        $return = $return->where('email', 'like', '%'.Request::get('email') .'%');
                    }
                    if(!empty(Request::get('date')))
                    {
                        $return = $return->whereDate('created_at', '=', Request::get('date'));
                    }

        $return = $return->orderBy('id', 'desc')
                    ->paginate(10);
        
        return $return;
    }

    static public function getStudent()
    {
        $return = self::select('users.*',
            'programs.program_name as program_name',
            )
            ->join('programs', 'users.std_program', '=', 'programs.id')
            ->where('user_type','=',3)
            ->where('is_deleted','!=','1');
            if(!empty(Request::get('name')))
            {
                $return = $return->where('name', 'like', '%'.Request::get('name') .'%');
            }
            if(!empty(Request::get('email')))
            {
                $return = $return->where('email', 'like', '%'.Request::get('email') .'%');
            }
            if(!empty(Request::get('date')))
            {
                $return = $return->whereDate('created_at', '=', Request::get('date'));
            }

        $return = $return->orderBy('id', 'desc')
                        ->paginate(10);
        
        return $return;
    }

    static public function currentUser() {
        $user_id = Auth::id();

        $return = User::select('users.*')
                    ->where('id' ,'=', $user_id)
                    ->first();
        
        return $return;
    }

    static public function getSingleStudent($id)
    {
        $return = self::select('users.*',
        'programs.program_name as program_name',
        )
        ->join('programs', 'users.std_program', '=', 'programs.id');
        
        $return = $return->where('users.id', '=', $id)->first();

        return $return;
    }
    
}
