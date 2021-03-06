<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'value'
    ];

    public function opportunities()
    {
        return $this->belongsToMany(Opportunity::class)->withPivot('quantity');
    }

    public function classifications()
    {
        return $this->belongsToMany(Classification::class);
    }
}
