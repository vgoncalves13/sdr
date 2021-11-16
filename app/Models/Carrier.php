<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function leads()
    {
        return $this->hasMany(Lead::class);
    }

    public function coverage_sources()
    {
        return $this->hasMany(CoverageSource::class);
    }
}
