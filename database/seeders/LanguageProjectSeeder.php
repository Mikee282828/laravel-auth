<?php

namespace Database\Seeders;

use App\Models\Language;
use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $project = Project::find(1);
        // $project->languages()->attach([1,2,3]);
        $language = Language::find(1);
        $language->projects()->attach([1,2,3]);
    }
}
