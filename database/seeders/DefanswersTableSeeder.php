<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Defanswers;

class DefanswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Defanswers::insert([
            ['name' => 'Always'],
            ['name' => 'Very Frequently'],
            ['name' => 'Some Times '],
            ['name' => 'Never'],                       
        ]);
    }
}
