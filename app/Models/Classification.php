<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classification extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'display_name',
        'multiply_factor'
    ];

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
}
