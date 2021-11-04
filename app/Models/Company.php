<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'cnpj',
        'name'
    ];

    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function telephones()
    {
        return $this->hasMany(Telephone::class);
    }

    public function opportunities()
    {
        return $this->hasMany(Opportunity::class);
    }
}
