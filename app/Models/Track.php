<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Album;

class Track extends Model
{

    protected $table = 'tracks';
    protected $fillable = [
        'name',
        'duration',
        'album_id'
    ];
    use HasFactory;
    public function album()
    {
        //Criando o relacionamento com o album
        //Cada faixa pertence a um album.
        return $this->belongsTo(Album::class);
    }
}
