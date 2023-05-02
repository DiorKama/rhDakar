<?php

namespace App\Models;

use App\Models\Admin;
use App\Models\Appointment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Code extends Model
{
    use HasFactory;
    protected $table = 'codes';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function appointment(){
        return $this->haMany(Appointment::class);
    }

    public function admin(){
        return $this->belongsTo(Admin::class);
        }
}
