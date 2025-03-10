<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'vorname',
        'nachname',
        'strasse',
        'hausnummer',
        'postleitzahl',
        'stadt',
        'land',
        'email',
        'password',
        'rolle',
        'agb_akzeptiert',
        'mitgliedsbeitrag',
        'belohnungspunkte',
        'naechster_zahltag',
        'einstiegsroman',
        'lieblingsroman',
        'lieblingszyklus',
        'lieblingscharakter',
        'lesestand',
        'leseform',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'naechster_zahltag' => 'date',
        ];
    }
    public function todoListen(): HasMany
    {
        return $this->hasMany(TodoListe::class, 'zugewiesen_an');
    }
}
