<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Request;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'carrier_id',
        'company_id'
    ];

    public function carrier()
    {
        return $this->belongsTo(Carrier::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }


}
