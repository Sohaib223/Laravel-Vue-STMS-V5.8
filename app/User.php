<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Mail\EmailVerification;
use Illuminate\Support\Facades\Mail;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'isVerified', 'status', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public static function backendcreator($request)
    {
        $user = new User;

        $user->name = $request->first_name . ' ' . $request->last_name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->status = 1;
        $user->role = 2;
        $user->is_verified = 0;

        $user->save();

        return $user;
    }
    public static function frontendcreator($request)
    {
        $user = new User;

        $user->name = $request->first_name . ' ' . $request->last_name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->status = 1;
        $user->role = 2;
        $user->is_verified = 1;

        $user->save();

        return $user;
    }
    public static function backUpdator($request, $id)
    {
        $user = User::findOrFail($id);

        $user->name = $request->first_name . ' ' . $request->last_name;

        if ($request->password !== null) {
            $user->password = bcrypt($request->password);
        }
        $reg_no = 'RG-' . mt_rand(100000, 999999) . auth()->user()->id;
        if ($user->email_verified_at === null) {
            if ($request->is_verified * 1 === 1) {
                $user->reg_no = $reg_no;

                Mail::to($user->email)->send(new EmailVerification($user, url('/email_verification/' . $reg_no)));
            }
        }

        $user->status = $request->status;
        $user->role = 2;
        $user->is_verified = $request->is_verified;

        $user->save();

        return $user;
    }
}