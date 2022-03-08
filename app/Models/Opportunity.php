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
        'user_id',
        'temperature',
        'observation'
    ];


    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class)->withPivot('quantity')->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function opportunities_followup()
    {
        return $this->hasMany(OpportunityFollowUp::class);
    }
}
