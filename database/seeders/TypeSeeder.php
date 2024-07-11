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
        $newType = new Type();
        $newType->name = 'Front-end';
        $newType->description = 'Wrote mainly in html css jss';
        $newType->icon = "fa-solid fa-window-maximize";
        $newType->save();

        $newType = new Type();
        $newType->name = 'Back-end';
        $newType->description = 'Wrote mainly in php and blade';
        $newType->icon = "fa-solid fa-server";
        $newType->save();

        $newType = new Type();
        $newType->name = 'Full stack';
        $newType->description = 'Wrote with front and back end languages';
        $newType->icon = "fa-solid fa-code";
        $newType->save();

        $newType = new Type();
        $newType->name = 'Design';
        $newType->description = "it's stylish!";
        $newType->icon = "fa-solid fa-marker";
        $newType->save();
    }
}
