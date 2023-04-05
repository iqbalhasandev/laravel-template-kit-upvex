<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleTableSeeder;
use Modules\Setting\Database\Seeders\SettingSeeder;
use Modules\Language\Database\Seeders\LanguageTableSeeder;
use Modules\Document\Database\Seeders\DocumentDatabaseSeeder;
use Modules\Template\Database\Seeders\TemplateDatabaseSeeder;
use Modules\WorkBook\Database\Seeders\WorkBookDatabaseSeeder;
use Modules\OpenAiTone\Database\Seeders\OpenAiToneDatabaseSeeder;
use Modules\OpenAiModel\Database\Seeders\OpenAiModelDatabaseSeeder;
use Modules\OpenAiLanguage\Database\Seeders\OpenAiLanguageSeederTableSeeder;
use Modules\OpenAiResolution\Database\Seeders\OpenAiResolutionDatabaseSeeder;
use Modules\TemplateCategory\Database\Seeders\TemplateCategoryDatabaseSeeder;
use Modules\OpenAiCreativityLevel\Database\Seeders\OpenAiCreativityLevelDatabaseSeeder;

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

        $this->call([
            LanguageTableSeeder::class,
            RoleTableSeeder::class,
            SettingSeeder::class,
        ]);

    }
}