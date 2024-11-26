<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class factoryseed extends Seeder
{
    public function run()
    {
        Person::factory(50)->create();
    }
}
