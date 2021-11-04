<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'address2',
        'number',
        'district',
        'city',
        'state',
        'postal_code'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
