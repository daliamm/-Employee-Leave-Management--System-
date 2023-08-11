<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveType extends Model
{
    use HasFactory;
    protected $fillable = [
        'leave_type_name',
        'count',
        'from_date',
        'to_date',
        'active',
    ];
}
