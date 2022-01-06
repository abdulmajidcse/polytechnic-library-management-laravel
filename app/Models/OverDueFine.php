<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OverDueFine extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'roll_pims_no', 'submit_date', 'payment',
    ];
}
