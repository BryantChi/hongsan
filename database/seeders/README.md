# 鴻盛建設機械網站 - Seed 資料使用說明

這個文件說明如何使用我們的 Seeder 來創建假資料，用於開發和測試。

## 前置準備

1. 確保您已完成資料庫配置和遷移（migrations）
2. 確保 `public/uploads` 目錄及其子目錄存在且可寫入

## 執行 Seed

執行以下命令來運行所有 seeder：

```bash
php artisan db:seed
```

這將按順序執行以下 seeder：

1. `UserSeeder` - 創建管理員和測試用戶
2. `ApplicationCategorySeeder` - 創建應用類別
3. `BrandSeeder` - 創建品牌資料
4. `ProductCategorySeeder` - 創建產品分類
5. `ProductSeeder` - 創建產品資料和產品圖片
6. `NewsSeeder` - 創建新聞資料
7. `LinkSeeder` - 創建友站連結

## 圖片處理

所有的 seeder 都會處理圖片：

1. 會嘗試從 `public/assets/images/00-hp/` 目錄複製預設圖片到 `public/uploads/` 目錄
2. 如果找不到源圖片，會使用預設的 `*_default.jpg` 圖片

## 預設語系

所有的多語系資料都會包含：

- 繁體中文 (zh_TW)
- 英文 (en)

## 預設管理員帳號

創建的預設管理員帳號：

- 帳號：admin@hongsan.com.tw
- 密碼：admin123

## 注意事項

1. 執行 seed 前，請確保資料表是空的，否則可能會造成資料重複
2. 如果只想執行特定的 seeder，可以使用：
   ```bash
   php artisan db:seed --class=ProductSeeder
   ```
3. 如果要重新執行所有 migrations 和 seeds，可以使用：
   ```bash
   php artisan migrate:fresh --seed
   ```
