<?php

namespace App\Models;

use App\Models\Leave;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LeaveStatus extends Model
{
    use HasFactory;
    protected $table = 'leave_statuses';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function leaves(){
        return $this->hasMany(Leave::class);
    }
}
