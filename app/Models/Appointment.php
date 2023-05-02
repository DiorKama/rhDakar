<?php

namespace App\Models;

use App\Models\Code;
use App\Models\User;
use App\Models\AppointmentType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    use HasFactory;
    protected $table = 'appointment';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function appointmentType(){
        return $this->belongsTo(AppointmentType::class);
        }

    public function code(){
        return $this->belongsTo(Code::class);
        }

        public function user(){
            return $this->belongsTo(User::class);
            }
}
