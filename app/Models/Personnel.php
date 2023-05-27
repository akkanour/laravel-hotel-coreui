<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Personnel extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'password',
        'adresse',
        'numTel',
        'typePoste',
    ];
    public function roomservices() : HasMany
    {
        return $this->hasMany(RoomService::class);
    }

}
