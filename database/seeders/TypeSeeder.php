<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types= [
            [
                'name' => 'back-end'
            ],
            [
                'name' => 'front-end'
            ],
            [
                'name' => 'full-stack'
            ]
        ];
        foreach($types as $type) {
            $newType = new Type();
            $newType->type_name = $type['name'];
            $newType->save();
        }
    }
}
