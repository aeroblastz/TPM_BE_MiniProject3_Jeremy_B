<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Person;

class personseeder extends Seeder
{
  
    public function run(): void
    {
        DB::table('genders')->insert([
            ['gender' => 'Male'],
            ['gender' => 'Female'],
        ]);
    }

}
