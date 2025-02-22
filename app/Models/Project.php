<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'img_preview',
        'type_id'
    ];

    public function type() // questa funzione permette di fare $projects->$type_id->name
    {
        return $this->belongsTo(Type::class);
    }

    public function languages(){
        return $this->belongsToMany('App\Models\Language');
    }
}
