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

    public function doFollowUp($temperature)
    {
        switch ($temperature){
            case 25:
                $temperature = 50;
                break;
            case 50:
                $temperature = 75;
                break;
            case 75:
                $temperature = 95;
                break;
        }
        return $temperature;
    }
}
