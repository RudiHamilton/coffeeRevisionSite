<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RevisionTask extends Model
{
    /** @use HasFactory<\Database\Factories\RevisionTaskFactory> */
    use HasFactory;
    protected $primaryKey = 'revision_task_id';

    protected $fillable = [
        'revision_timeline_id',
        'name',
        'description',
        'start_time',
        'finish_time',
        'completed',
    ];
    public function revisiontimeline()
    {
        return $this->belongsTo(RevisionTimeline::class);
    }
}
