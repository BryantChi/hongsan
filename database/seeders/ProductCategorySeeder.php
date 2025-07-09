<?php

namespace Database\Seeders;

use App\Models\Admin\ProductCategories;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 確保上傳目錄存在
        $uploadPath = public_path('uploads/categories');
        if (!File::exists($uploadPath)) {
            File::makeDirectory($uploadPath, 0755, true);
        }

        $categories = [
            // 建設機械 (application_categories_info_id = 1)
            [
                'name_zh' => '履帶式挖掘機',
                'name_en' => 'Crawler Excavator',
                'application_categories_info_id' => 1,
                'slug' => 'crawler-excavator',
            ],
            [
                'name_zh' => '輪胎式挖掘機',
                'name_en' => 'Wheeled Excavator',
                'application_categories_info_id' => 1,
                'slug' => 'wheeled-excavator',
            ],
            [
                'name_zh' => '起重機',
                'name_en' => 'Crane',
                'application_categories_info_id' => 1,
                'slug' => 'crane',
            ],
            [
                'name_zh' => '高空作業車',
                'name_en' => 'Aerial Work Platform',
                'application_categories_info_id' => 1,
                'slug' => 'aerial-work-platform',
            ],
            [
                'name_zh' => '壓路機',
                'name_en' => 'Road Roller',
                'application_categories_info_id' => 1,
                'slug' => 'road-roller',
            ],
            [
                'name_zh' => '推土機',
                'name_en' => 'Bulldozer',
                'application_categories_info_id' => 1,
                'slug' => 'bulldozer',
            ],
            [
                'name_zh' => '裝載機',
                'name_en' => 'Wheel Loader',
                'application_categories_info_id' => 1,
                'slug' => 'wheel-loader',
            ],
            [
                'name_zh' => '瀝青攤鋪機',
                'name_en' => 'Asphalt Paver',
                'application_categories_info_id' => 1,
                'slug' => 'asphalt-paver',
            ],

            // 液壓配件 (application_categories_info_id = 2)
            [
                'name_zh' => '液壓泵',
                'name_en' => 'Hydraulic Pump',
                'application_categories_info_id' => 2,
                'slug' => 'hydraulic-pump',
            ],
            [
                'name_zh' => '液壓閥',
                'name_en' => 'Hydraulic Valve',
                'application_categories_info_id' => 2,
                'slug' => 'hydraulic-valve',
            ],
            [
                'name_zh' => '液壓缸',
                'name_en' => 'Hydraulic Cylinder',
                'application_categories_info_id' => 2,
                'slug' => 'hydraulic-cylinder',
            ],
            [
                'name_zh' => '液壓馬達',
                'name_en' => 'Hydraulic Motor',
                'application_categories_info_id' => 2,
                'slug' => 'hydraulic-motor',
            ],
            [
                'name_zh' => '液壓過濾器',
                'name_en' => 'Hydraulic Filter',
                'application_categories_info_id' => 2,
                'slug' => 'hydraulic-filter',
            ],
            [
                'name_zh' => '液壓軟管',
                'name_en' => 'Hydraulic Hose',
                'application_categories_info_id' => 2,
                'slug' => 'hydraulic-hose',
            ],

            // 農業機械 (application_categories_info_id = 3)
            [
                'name_zh' => '拖拉機',
                'name_en' => 'Tractor',
                'application_categories_info_id' => 3,
                'slug' => 'tractor',
            ],
            [
                'name_zh' => '收割機',
                'name_en' => 'Harvester',
                'application_categories_info_id' => 3,
                'slug' => 'harvester',
            ],
            [
                'name_zh' => '播種機',
                'name_en' => 'Seeder',
                'application_categories_info_id' => 3,
                'slug' => 'seeder',
            ],
            [
                'name_zh' => '噴灑機',
                'name_en' => 'Sprayer',
                'application_categories_info_id' => 3,
                'slug' => 'sprayer',
            ],
            [
                'name_zh' => '耕作機',
                'name_en' => 'Cultivator',
                'application_categories_info_id' => 3,
                'slug' => 'cultivator',
            ],
            [
                'name_zh' => '農用運輸車',
                'name_en' => 'Agricultural Transport Vehicle',
                'application_categories_info_id' => 3,
                'slug' => 'agricultural-transport-vehicle',
            ],

            // 環保能源 (application_categories_info_id = 4)
            [
                'name_zh' => '風力發電機',
                'name_en' => 'Wind Turbine',
                'application_categories_info_id' => 4,
                'slug' => 'wind-turbine',
            ],
            [
                'name_zh' => '太陽能設備',
                'name_en' => 'Solar Equipment',
                'application_categories_info_id' => 4,
                'slug' => 'solar-equipment',
            ],
            [
                'name_zh' => '生物質能源設備',
                'name_en' => 'Biomass Energy Equipment',
                'application_categories_info_id' => 4,
                'slug' => 'biomass-energy-equipment',
            ],
            [
                'name_zh' => '水力發電設備',
                'name_en' => 'Hydropower Equipment',
                'application_categories_info_id' => 4,
                'slug' => 'hydropower-equipment',
            ],
            [
                'name_zh' => '廢物處理設備',
                'name_en' => 'Waste Treatment Equipment',
                'application_categories_info_id' => 4,
                'slug' => 'waste-treatment-equipment',
            ],
            [
                'name_zh' => '節能系統',
                'name_en' => 'Energy Saving System',
                'application_categories_info_id' => 4,
                'slug' => 'energy-saving-system',
            ],
        ];

        // 從 assets 目錄複製預設分類圖片到 uploads 目錄
        $defaultImages = [
            'picbg1.jpg',
            'picbg1.jpg',
            'picbg1.jpg',
            'picbg1.jpg',
            'picbg1.jpg',
            'picbg1.jpg',
            'picbg1.jpg',
            'picbg1.jpg',
            'picbg1.jpg',
            'picbg1.jpg',
            'picbg1.jpg',
        ];

        $defaultImage = 'picbg1.jpg'; // 用於額外類別的默認圖片

        foreach ($categories as $index => $category) {
            // 複製圖片到 uploads 目錄
            if ($index < count($defaultImages)) {
                $sourcePath = public_path('assets/images/05/'.$defaultImages[$index]);
            } else {
                $sourcePath = public_path('assets/images/05/'.$defaultImage);
            }

            $imageName = 'category_'.Str::random(10).'.jpg';
            $destPath = $uploadPath.'/'.$imageName;

            if (File::exists($sourcePath)) {
                File::copy($sourcePath, $destPath);
            } else {
                $imageName = 'category_default.jpg';
            }

            // 創建分類資料
            $categoryData = ProductCategories::create([
                'application_categories_info_id' => $category['application_categories_info_id'],
                'slug' => $category['slug'],
                'image' => 'categories/'.$imageName,
            ]);

            // 多語系翻譯
            $categoryData->translations()->create([
                'locale' => 'zh_TW',
                'name' => $category['name_zh'],
            ]);

            $categoryData->translations()->create([
                'locale' => 'en',
                'name' => $category['name_en'],
            ]);
        }
    }
}
