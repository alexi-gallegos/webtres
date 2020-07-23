<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Image;
use Illuminate\Support\Facades\Storage;

\Carbon\Carbon::setToStringFormat('d/m/Y');


class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'rut', 'nombres', 'apellido_paterno', 'apellido_materno', 'fecha_nacimiento', 'email', 'password', 
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

    protected $dates = ['fecha_nacimiento'];

    public function get_users(){
        return $this::select('rut', 'nombres', 'apellido_paterno', 'apellido_materno','fecha_nacimiento', 'email', 'imagen')
                                    ->orderBy('created_at', 'desc')
                                    ->paginate(6);
    }

    public function store($request){
        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $img = Image::make($file->getRealPath());
            $img->resize(200, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->stream();
            $filename = uniqid().'.'.$file->getClientOriginalExtension();
            Storage::disk('images')->put($filename,   $img);
        }
        $this->nombres = $request->nombres;
        $this->apellido_paterno = $request->apellido_paterno;
        $this->apellido_materno = $request->apellido_materno;
        $this->rut = $request->rut;
        $this->fecha_nacimiento = $request->fecha_nacimiento;
        $this->imagen = $filename;
        $this->email = $request->email;
        $this->password = $request->password;
    }

}
