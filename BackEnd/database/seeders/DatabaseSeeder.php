<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => '123456789',
        ]);


        \App\Models\Student::factory()->create([
            'registration' => 'Admin',
            'codercp' => 'admin@gmail.com',
            'cin' => 'A123456789',
            'familyname' => 'maslouh',
            'dateofbirth' => now(),
            'country' => 'Your Country',
            'picture' => 'path/to/picture.jpg',
            'university' => 'Your University',
            'speciality' => 'Your Speciality',
            'level' => 'Your Level',
            'cost' => 'Your Cost',
            'amountpay' => 'Your Amount Pay',
            'amountremaining' => 'Your Amount Remaining',
            'integrationdate' => now(),
            'enddate' => now(),
            'phone' => 'Your Phone',
            'statut' => '1',
            'user_id' =>  \App\Models\User::where('email', 'admin@gmail.com')->value('id'),
        ]);
    }
}
