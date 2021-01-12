<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompetitionProblem extends Model
{
    protected $fillable = [
        'competition_id', 'reason','user_id'
    ];
}
