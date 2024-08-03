<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectTask extends Model
{
    //

    protected $fillable = [
        'percentage', 'status', 'actual_date'
    ];

}
