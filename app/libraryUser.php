<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class libraryUser extends Model
{
    protected $fillable = [
        'name', 'mobile', 'technology', 'session', 'shift', 'roll_no', 'reg_no', 'library_card_no', 'pims_no', 'image', 'person',
    ];
}
