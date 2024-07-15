<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $newLanguage = new Language();
        $newLanguage->name = 'html';
        $newLanguage->save();

        $newLanguage = new Language();
        $newLanguage->name = 'css';
        $newLanguage->save();

        $newLanguage = new Language();
        $newLanguage->name = 'javascript';
        $newLanguage->save();

        $newLanguage = new Language();
        $newLanguage->name = 'vue';
        $newLanguage->save();

        $newLanguage = new Language();
        $newLanguage->name = 'php';
        $newLanguage->save();

        $newLanguage = new Language();
        $newLanguage->name = 'laravel';
        $newLanguage->save();
    }
}
