<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable =[
        'client_id',
        'chambre_id',
        'dateDebut',
        'dateFin',
    ];
    public function clients() : BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
    public  function chambres() : BelongsTo
    {
        return $this->belongsTo(Chambre::class);
    }

}
