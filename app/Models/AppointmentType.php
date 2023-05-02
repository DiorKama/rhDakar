<?php

namespace App\Models;

use App\Models\Appointment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AppointmentType extends Model
{
    use HasFactory;
    protected $table = 'appointment_types';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    
    public function appointments(){
        return $this->hasMany(Appointment::class);
    }
}
