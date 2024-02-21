<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void{
        $technologies = [
            [
                'name'=> 'HTML'
            ],
            [
                'name'=> 'CSS'
            ],
            [
                'name'=> 'JavaScript'
            ],
            [
                'name'=> 'VueJS'
            ],
            [
                'name'=> 'Vite'
            ],
            [
                'name'=> 'PHP'
            ],
            [
                'name'=> 'Laravel 10'
            ],
        ];
        foreach ($technologies as $technology) {
            $newTechnology = new Technology();
            $newTechnology->name = $technology['name'];
            $newTechnology->save();
        }
    }
}
