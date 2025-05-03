<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreditAgricole extends Model
{
    use HasFactory;
    protected $table = 'credit_agricole';

    protected $fillable = [
        'date',
        'type',
        'establishment',
        'payer_name',
        'lcn_number',
        'due_date',
        'amount',
        'account_number',
    ];
}
