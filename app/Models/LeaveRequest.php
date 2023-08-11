<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class LeaveRequest extends Model
{
    protected $fillable = [
        'employee_id',
        'leave_type_id',
        'start_date',
        'end_date',
        'reason',
        'status',
    ];

    public function employee()
    {
        return $this->belongsTo('App\Models\Employee');
    }

    public function leaveType()
    {
        return $this->belongsTo('App\Models\LeaveType');
    }
}

