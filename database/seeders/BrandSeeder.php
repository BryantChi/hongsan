<?php

namespace Database\Seeders;

use App\Models\Admin\BrandsInfo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 確保上傳目錄存在
        $uploadPath = public_path('uploads/brands');
        if (!File::exists($uploadPath)) {
            File::makeDirectory($uploadPath, 0755, true);
        }        // 從 assets 目錄複製預設品牌圖片到 uploads 目錄
        $defaultImages = [
            'acc_pic.jpg',
            'acc_pic.jpg',
            'acc_pic.jpg',
            'acc_pic.jpg',
            'acc_pic.jpg',
            'acc_pic.jpg',
            'acc_pic.jpg',
            'acc_pic.jpg',
        ];

        $defaultImage = 'acc_pic.jpg'; // 用於額外品牌的默認圖片

        $brands = [
            // 建設機械 (application_categories_info_id = 1)
            [
                'name' => 'LIEBHERR',
                'application_categories_info_id' => 1,
                'slug' => 'liebherr',
            ],
            [
                'name' => 'MAGNI',
                'application_categories_info_id' => 1,
                'slug' => 'magni',
            ],
            [
                'name' => 'DOOSAN',
                'application_categories_info_id' => 1,
                'slug' => 'doosan',
            ],
            [
                'name' => 'KOMATSU',
                'application_categories_info_id' => 1,
                'slug' => 'komatsu',
            ],
            [
                'name' => 'HITACHI',
                'application_categories_info_id' => 1,
                'slug' => 'hitachi',
            ],
            [
                'name' => 'CATERPILLAR',
                'application_categories_info_id' => 1,
                'slug' => 'caterpillar',
            ],
            [
                'name' => 'VOLVO',
                'application_categories_info_id' => 1,
                'slug' => 'volvo',
            ],
            // 液壓配件 (application_categories_info_id = 2)
            [
                'name' => 'REXROTH',
                'application_categories_info_id' => 2,
                'slug' => 'rexroth',
            ],
            [
                'name' => 'PARKER',
                'application_categories_info_id' => 2,
                'slug' => 'parker',
            ],
            [
                'name' => 'EATON',
                'application_categories_info_id' => 2,
                'slug' => 'eaton',
            ],
            [
                'name' => 'KAWASAKI',
                'application_categories_info_id' => 2,
                'slug' => 'kawasaki',
            ],
            // 農業機械 (application_categories_info_id = 3)
            [
                'name' => 'JOHN DEERE',
                'application_categories_info_id' => 3,
                'slug' => 'john-deere',
            ],
            [
                'name' => 'CLAAS',
                'application_categories_info_id' => 3,
                'slug' => 'claas',
            ],
            [
                'name' => 'NEW HOLLAND',
                'application_categories_info_id' => 3,
                'slug' => 'new-holland',
            ],
            [
                'name' => 'CASE IH',
                'application_categories_info_id' => 3,
                'slug' => 'case-ih',
            ],
            // 環保能源 (application_categories_info_id = 4)
            [
                'name' => 'VESTAS',
                'application_categories_info_id' => 4,
                'slug' => 'vestas',
            ],
            [
                'name' => 'SIEMENS GAMESA',
                'application_categories_info_id' => 4,
                'slug' => 'siemens-gamesa',
            ],
            [
                'name' => 'GE RENEWABLE',
                'application_categories_info_id' => 4,
                'slug' => 'ge-renewable',
            ],
            [
                'name' => 'SUNPOWER',
                'application_categories_info_id' => 4,
                'slug' => 'sunpower',
            ],
        ];

        foreach ($brands as $index => $brand) {
            // 複製圖片到 uploads 目錄
            if ($index < count($defaultImages)) {
                $sourcePath = public_path('assets/images/03/'.$defaultImages[$index]);
            } else {
                $sourcePath = public_path('assets/images/03/'.$defaultImage);
            }

            $imageName = 'brand_'.Str::random(10).'.jpg';
            $destPath = $uploadPath.'/'.$imageName;

            if (File::exists($sourcePath)) {
                File::copy($sourcePath, $destPath);
            } else {
                $imageName = 'brand_default.jpg';
            }

            // 創建品牌資料
            $brandData = BrandsInfo::create([
                'application_categories_info_id' => $brand['application_categories_info_id'],
                'slug' => $brand['slug'],
                'image' => 'brands/'.$imageName,
            ]);

            // 多語系翻譯
            $brandData->translations()->create([
                'locale' => 'zh_TW',
                'name' => $brand['name'],
            ]);

            $brandData->translations()->create([
                'locale' => 'en',
                'name' => $brand['name'],
            ]);
        }
    }
}
