<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuarios';
    protected $primaryKey = 'numero';
    public $timestamps = false;

    protected $fillable = ['email', 'contrasena', 'rol'];

    protected $hidden = ['contrasena', 'remember_token'];

    /**
     * Obtener el nombre de la columna de contraseña para autenticación
     */
    public function getAuthPassword()
    {
        return $this->contrasena;
    }

    /**
     * Obtener el nombre de la columna de email para autenticación
     */
    public function getEmailForPasswordReset()
    {
        return $this->email;
    }
}
