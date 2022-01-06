<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentList extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name', 'pims_no', 'email', 'submit_date', 'payment', 'verify_token', 'status'
    ];
}
