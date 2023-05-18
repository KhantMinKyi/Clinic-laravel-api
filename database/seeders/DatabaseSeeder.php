<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Breed;
use App\Models\Status;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Breed::create([
            'name'=>'German Shepherd'
        ]);
        Breed::create([
            'name'=>'Golden Retriever'
        ]);
        Breed::create([
            'name'=>'Chihuahua'
        ]);
        Status::create([
            'name'=>'Sick'
        ]);
        Status::create([
            'name'=>'Food Allergy'
        ]);
        Status::create([
            'name'=>'HeatStoke'
        ]);
        Status::create([
            'name'=>'External parasites'
        ]);
        Status::create([
            'name'=>'Heartworms'
        ]);
        Status::create([
            'name'=>'Injuries '
        ]);
    }
}
