<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opportunity extends Model
{
    use HasFactory;

    protected $fillable = [
        'contact_name',
        'customer_base',
        'customer_competition',
        'lines',
        'current_product',
    ];


    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
