<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Chambre extends Model
{
    use HasFactory;
    protected $fillable = [
        'typeChambre',
        'prix',
        'dispo',
        'numChambre',
        'commodite',
    ];
    public function roomservices() : HasMany
    {
        return $this->hasMany(RoomService::class);
    }
    public function reservations() : HasMany
    {
        return $this->hasMany(Reservation::class);
    }

}
