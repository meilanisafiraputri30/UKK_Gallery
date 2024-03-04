<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class likefoto extends Model
{
    use HasFactory;
    // protected $table = 'namatable';
    protected $fillable = ['user_id', 'foto_id'];

    public function foto()
    {
        return $this->belongsTo(foto::class, 'foto_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
