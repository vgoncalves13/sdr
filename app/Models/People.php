<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;

    protected $table = 'peoples';

    protected $fillable = [
        'name',
        'email',
        'telephone',
        'sector_id',
        'manager_id',
        'UF'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }

    public function manager()
    {
        return $this->belongsTo(People::class);
    }
}
