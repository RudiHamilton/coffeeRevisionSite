<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RevisionTimeline extends Model
{
    /** @use HasFactory<\Database\Factories\RevisionTimelineFactory> */
    use HasFactory;
    protected $primaryKey = 'revision_timeline_id';
    protected $fillable = [
        'user_id',
        'name',
        'description',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
