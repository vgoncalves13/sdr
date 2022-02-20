<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opportunity extends Model
{
    use HasFactory;

    protected $fillable = [
        'contact_name',
        'contact_tel',
        'contact_email',
        'user_id'
    ];


    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class)->withTimestamps();
    }
}
