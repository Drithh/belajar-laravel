<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayerTeam extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_name',
    ];

    public function player()
    {
        return $this->belongsTo(Player::class);
    }
}
