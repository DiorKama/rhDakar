<?php

namespace App\Models;

use App\Models\Admin;
use App\Models\LeaveType;
use App\Models\LeaveStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Leave extends Model
{
    use HasFactory;
    protected $table = 'leaves';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(Admin::class);
        }
    public function leaveType(){
        return $this->belongsTo(LeaveType::class);
        }
    public function leaveStatus(){
        return $this->belongsTo(LeaveStatus::class);
        }
}
