<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trasabilite extends Model
{
    use HasFactory;
    protected $table='trasabilite';

    protected $fillable=['id_operateur','splice_name','location','quantite'];
}
