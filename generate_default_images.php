<?php
// 這個腳本用於生成預設圖片
// 假設這些預設圖片不存在時使用

// 默認圖片尺寸
$width = 800;
$height = 600;

// 創建圖片
$image = imagecreatetruecolor($width, $height);

// 設置背景色（淺灰色）
$bg_color = imagecolorallocate($image, 240, 240, 240);
imagefill($image, 0, 0, $bg_color);

// 設置文字顏色（深灰色）
$text_color = imagecolorallocate($image, 100, 100, 100);

// 文字內容
$text = "預設圖片";

// 獲取字體尺寸
$font_size = 30;
$box = imagettfbbox($font_size, 0, 'arial.ttf', $text);

// 計算文字位置使其居中
$text_width = abs($box[2] - $box[0]);
$text_height = abs($box[7] - $box[1]);
$x = ($width - $text_width) / 2;
$y = ($height - $text_height) / 2 + $text_height;

// 寫入文字
imagettftext($image, $font_size, 0, $x, $y, $text_color, 'arial.ttf', $text);

// 保存圖片
$output_dir = __DIR__ . '/uploads/';
if (!file_exists($output_dir)) {
    mkdir($output_dir, 0755, true);
}

// 保存不同類型的默認圖片
$image_types = ['brands', 'categories', 'products', 'news', 'links'];
foreach ($image_types as $type) {
    $output_path = $output_dir . $type . '/';
    if (!file_exists($output_path)) {
        mkdir($output_path, 0755, true);
    }

    imagejpeg($image, $output_path . $type . '_default.jpg');
}

// 釋放資源
imagedestroy($image);

echo "預設圖片已生成。\n";
?>
