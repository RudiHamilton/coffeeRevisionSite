<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MMR extends Model
{
    /** @use HasFactory<\Database\Factories\MMRFactory> */
    use HasFactory;

    protected $primaryKey = 'mmr_id';

    protected $fillable = [
        'rank_id',
        'user_id', 
        'mmr_number',
    ];
}
