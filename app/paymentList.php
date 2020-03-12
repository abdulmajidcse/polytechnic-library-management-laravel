<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class paymentList extends Model
{
    protected $fillable = [
        'name', 'pims_no', 'email', 'submit_date', 'payment', 'verify_token', 'status'
    ];
}
