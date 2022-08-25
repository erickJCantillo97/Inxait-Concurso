<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    use HasFactory;

    protected $fillable = [
        'departamento_id',
        'name'
    ];

    public function departamento(){
        return $this->belongsTo(\App\Models\Departamento::class, 'departamento_id');
    }

    public function users(){
        return $this->belongsTo(\App\Models\User::class, 'ciudad_id');
    }
}
