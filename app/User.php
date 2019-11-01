<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    const TYPE_ADMIN = 'Administrador';
    const TYPE_COLLABORATOR = 'Colaborador';
    const TYPE_STUDENT = 'Alumno';
    const TYPE_TEACHER = 'Docente';
    const TYPE_ADMINISTRATIVE = 'Administrativo';

    const SESSION_TYPES = [
        self::TYPE_ADMIN,
        self::TYPE_COLLABORATOR,
        self::TYPE_STUDENT,
        self::TYPE_TEACHER,
        self::TYPE_ADMINISTRATIVE,
    ];

    /**
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_type',
        'payroll',
        'career',
        'position',
        'control_number',
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
}
