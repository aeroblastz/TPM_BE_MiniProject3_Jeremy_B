<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;
    protected $table = 'persons';

    protected $fillable = [
        'name', 'age','job','gender_id'
    ];

    public function gender(){
        return $this->belongsTo(Gender::class, 'gender_id');
    }
}
