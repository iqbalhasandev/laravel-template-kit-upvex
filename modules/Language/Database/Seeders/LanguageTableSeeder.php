<?php

namespace Modules\Language\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Language\Entities\Language;

class LanguageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call("OthersTableSeeder");
        Language::truncate();

        $data = [
            [
                'title' => 'en',
                'lang_name' => 'English',
                'slug' => 'en',
                'status' => 1,
            ], [
                'title' => 'bn',
                'lang_name' => 'Bangla',
                'slug' => 'bn',
                'status' => 1,
            ],
        ];
        foreach ($data as $lan) {
            Language::create($lan);
        }
    }
}
