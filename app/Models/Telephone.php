<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telephone extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'type',
        'carrier'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
