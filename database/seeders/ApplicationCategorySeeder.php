<?php

namespace Database\Seeders;

use App\Models\Admin\ApplicationCategoriesInfo;
use Illuminate\Database\Seeder;

class ApplicationCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            '建設機械',
            '液壓配件',
            '農業機械',
            '環保能源',
        ];

        foreach ($categories as $category) {
            ApplicationCategoriesInfo::create([
                'name' => $category,
            ]);
        }
    }
}
