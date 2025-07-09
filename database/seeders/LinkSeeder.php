<?php

namespace Database\Seeders;

use App\Models\Admin\LinkInfo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class LinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 確保上傳目錄存在
        $uploadPath = public_path('uploads/links');
        if (!File::exists($uploadPath)) {
            File::makeDirectory($uploadPath, 0755, true);
        }

        $links = [
            [
                'name' => 'LIEBHERR',
                'url' => 'https://www.liebherr.com/',
                'status' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'MAGNI',
                'url' => 'https://www.magnith.com/',
                'status' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'DOOSAN',
                'url' => 'https://www.doosanequipment.com/',
                'status' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'KOMATSU',
                'url' => 'https://www.komatsu.com/',
                'status' => true,
                'sort_order' => 4,
            ],
            [
                'name' => 'HITACHI',
                'url' => 'https://www.hitachicm.com/',
                'status' => true,
                'sort_order' => 5,
            ],
        ];

        // 從 assets 目錄複製預設友站連結圖片到 uploads 目錄
        $defaultImages = [
            'brand01.jpg',
            'brand02.jpg',
            'brand03.jpg',
            'brand04.jpg',
            'brand05.jpg',
        ];

        foreach ($links as $index => $link) {
            // 複製圖片到 uploads 目錄
            $sourcePath = public_path('assets/images/00-hp/'.$defaultImages[$index]);
            $imageName = 'link_'.Str::random(10).'.jpg';
            $destPath = $uploadPath.'/'.$imageName;

            if (File::exists($sourcePath)) {
                File::copy($sourcePath, $destPath);
            } else {
                $imageName = 'link_default.jpg';
            }

            // 創建友站連結資料
            LinkInfo::create([
                'name' => $link['name'],
                'url' => $link['url'],
                'image' => 'links/'.$imageName,
                'sort_order' => $link['sort_order'],
                'status' => $link['status'],
            ]);
        }
    }
}
