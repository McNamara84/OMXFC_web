<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TodoListe extends Model
{
    use HasFactory;

    protected $fillable = [
        'titel',
        'beschreibung',
        'zugewiesen_an',
        'erledigt',
        'belohnungspunkte',
    ];

    public function zugewiesenAn(): BelongsTo
    {
        return $this->belongsTo(User::class, 'zugewiesen_an');
    }
}