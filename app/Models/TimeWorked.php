<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeWorked extends Model
{
    /** @use HasFactory<\Database\Factories\TimeWorkedFactory> */
    use HasFactory;
    protected $primaryKey = 'time_worked_id';

    protected $fillable = [
        'user_id',
        'pomodoro_time',
        'flashcard_time',
        'revision_time',
        'overall_time',
    ];
}
