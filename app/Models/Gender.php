<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gender extends Model
{
    protected $fillable=[
        'gender'
    ];
    public function person(){
        return $this->hasMany(Person::class);
    }
}
