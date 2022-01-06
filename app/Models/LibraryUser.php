<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LibraryUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'mobile', 'technology', 'session', 'shift', 'roll_no', 'reg_no', 'library_card_no', 'pims_no', 'image', 'person',
    ];
}
