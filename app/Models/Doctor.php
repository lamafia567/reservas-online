<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable = ['nombres','apellidos','run','fono','licencia_medica','especialidad','user_id'];

    public function consultorio(){
        return $this->belongsTo(Consultorio::class);
    }
    public function horarios(){
        return $this->hasMany(Horario::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function event(){
        return $this->hasMany(Event::class);
    }

    public function pago(){
        return $this->hasMany(Pago::class);
    }
    
    public function historial(){
        return $this->hasMany(Historial::class);
    }
}
