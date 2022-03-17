<?php

namespace App\Models;

use Laratrust\Models\LaratrustTeam;

class Team extends LaratrustTeam
{
    public $fillable = [
        'name',
        'display_name',
        'description',
        'sector_id'
    ];

    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }

    public function members()
    {
        $roles = Role::get();
        $users = User::whereRoleIs($roles->pluck('name')->toArray(), $this)->get();
        return $users;
    }
}
