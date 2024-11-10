<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    //$fillable is a property that is used to define the fields that are allowed to be mass assigned
    protected $fillable = [
        'amount',
        'description',
        'category',
        'expense_date',
        'payment_method'
    ];
    // $casts is a property that is used to define the data types of the fields
    protected $casts = [
        'expense_date' => 'date',
        'amount' => 'decimal:2'
    ];
}