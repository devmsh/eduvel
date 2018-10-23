<?php

use Illuminate\Database\Seeder;

class OurFoundersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(\App\OurFounders::class, 5)->create();
        App\OurFounders::create([
            'image' => '1521792809.jpg',
            'name' => 'Mohammed Alzard',
            'job' => 'Admin',
        ]);
        App\OurFounders::create([
            'image' => '1521792832.jpg',
            'name' => 'Mohammed Alzard',
            'job' => 'Admin',
        ]);
        App\OurFounders::create([
            'image' => '1521792855.jpg',
            'name' => 'Mohammed Alzard',
            'job' => 'Admin',
        ]);
        App\OurFounders::create([
            'image' => '1521792874.jpg',
            'name' => 'Mohammed Alzard',
            'job' => 'Admin',
        ]);
        App\OurFounders::create([
            'image' => '1521792915.jpg',
            'name' => 'Mohammed Alzard',
            'job' => 'Admin',
        ]);

    }
}
