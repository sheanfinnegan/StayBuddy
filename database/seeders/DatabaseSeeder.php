<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Shean Finneganr',
            'desc' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempore
                            eveniet suscipit necessitatibus aliquam inventore ipsam, iusto ratione distinctio ab odio? Illum
                            quas accusamus dolorem modi consectetur, odit',
            
            'email' => 'sheanfinnegan2905@gmail.com',
            'phone_num' => '+62 81228831147',
            'bod' => '2005-09-29',
            'gender' => 'Male',
            'occupation' => 'Student',
            'password' => 'shean2909'
        ]);
    }
}
