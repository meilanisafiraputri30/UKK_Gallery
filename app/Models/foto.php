<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class foto extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function album()
    {
        return $this->belongsTo(Album::class, 'album_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function Komentar()
    {
        return $this->hasMany(Komentarfoto::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function like()
    {
        return $this->hasMany(likefoto::class, 'foto_id');
    }
}
