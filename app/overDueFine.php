<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class overDueFine extends Model
{
    protected $fillable = [
        'roll_pims_no', 'submit_date', 'payment',
    ];
}
