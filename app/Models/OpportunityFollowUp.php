<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpportunityFollowUp extends Model
{
    use HasFactory;

    protected $table = 'opportunities_followup';

    protected $fillable = [
        'opportunity_id',
        'temperature',
        'observations'
    ];

    public function opportunity()
    {
        return $this->belongsTo(Opportunity::class);
    }
}
