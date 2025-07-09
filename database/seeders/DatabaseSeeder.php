<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 創建用戶
        // $this->call(UserSeeder::class);

        // 創建應用類別
        // $this->call(ApplicationCategorySeeder::class);

        // 創建品牌
        $this->call(BrandSeeder::class);

        // 創建產品分類
        $this->call(ProductCategorySeeder::class);

        // 創建產品資料
        $this->call(ProductSeeder::class);

        // 創建新聞資料
        $this->call(NewsSeeder::class);

        // 創建友站連結
        // $this->call(LinkSeeder::class);
    }
}
