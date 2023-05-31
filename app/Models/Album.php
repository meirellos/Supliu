<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Track;

class Album extends Model
{
    use HasFactory;
    protected $table = 'albums';
    protected $fillable = [
        'name',
        'image',
        'date',
    ];
    public function tracks()
    {
        //Criando o relacionamento com o model de faixas.
        //Um album pode ter várias faixas.
        return $this->hasMany(Track::class);
    }
}
