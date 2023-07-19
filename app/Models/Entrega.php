<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrega extends Model
{
    use HasFactory;

    protected $table = 'entrega';
    
    protected $fillable = [
        'valor_entrega',
        'tempo_entrega',
    ];
}
