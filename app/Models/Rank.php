<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    /** @use HasFactory<\Database\Factories\RankFactory> */
    use HasFactory;
    protected $primaryKey = 'rank_id';
    protected $fillable = [
        'rank',
        'rank_icon',
    ];
}
