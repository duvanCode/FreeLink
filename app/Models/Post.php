<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'remember_token',
        'title',
        'contenido',
        'link',
        'user_id',
        'foto_id',
    ];
    public function foto()
    {
        return $this->belongsTo(Foto::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
