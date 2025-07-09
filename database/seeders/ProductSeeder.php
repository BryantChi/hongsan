<?php

namespace Database\Seeders;

use App\Models\Admin\ProductsInfo;
use App\Models\Admin\ProductImage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 確保上傳目錄存在
        $uploadPath = public_path('uploads/products');
        if (!File::exists($uploadPath)) {
            File::makeDirectory($uploadPath, 0755, true);
        }

        $products = [
            // 建設機械 (application_categories_info_id = 1)
            [
                'name_zh' => 'LIEBHERR R 950 挖掘機',
                'name_en' => 'LIEBHERR R 950 Excavator',
                'application_categories_info_id' => 1,
                'brands_info_id' => 1, // LIEBHERR
                'product_categories_id' => 1, // 履帶式挖掘機
                'version' => 'R 950',
                'quick_bucket_changer' => true,
                'operating_converter' => true,
                'pdf' => 'liebherr_r950_spec.pdf', // PDF 檔案
                'piping_zh' => '標準配管、特殊配管可客製',
                'piping_en' => 'Standard piping, custom options available',
                'glue_block_zh' => '標準膠塊、特殊膠塊可客製',
                'glue_block_en' => 'Standard rubber blocks, custom options available',
                'introduction_zh' => '<p>LIEBHERR R 950 挖掘機是一款高效能的工程機械，專為重型挖掘工作設計。</p><p>特點包括：</p><ul><li>強大的動力系統</li><li>精準的操控性</li><li>優異的燃油效率</li><li>舒適的駕駛艙設計</li></ul>',
                'introduction_en' => '<p>LIEBHERR R 950 Excavator is a high-performance construction machine designed for heavy-duty excavation work.</p><p>Features include:</p><ul><li>Powerful engine system</li><li>Precise control</li><li>Excellent fuel efficiency</li><li>Comfortable cabin design</li></ul>',
            ],
            [
                'name_zh' => 'MAGNI RTH 6.51 旋轉伸縮高空作業車',
                'name_en' => 'MAGNI RTH 6.51 Rotating Telescopic Handler',
                'application_categories_info_id' => 1,
                'brands_info_id' => 2, // MAGNI
                'product_categories_id' => 4, // 高空作業車
                'version' => 'RTH 6.51',
                'quick_bucket_changer' => false,
                'operating_converter' => true,
                'pdf' => 'magni_rth651_spec.pdf', // PDF 檔案
                'piping_zh' => '標準配管、特殊配管可客製',
                'piping_en' => 'Standard piping, custom options available',
                'glue_block_zh' => '標準膠塊、特殊膠塊可客製',
                'glue_block_en' => 'Standard rubber blocks, custom options available',
                'introduction_zh' => '<p>MAGNI RTH 6.51 是一款高性能的旋轉伸縮高空作業車，最大工作高度可達51米。</p><p>特點包括：</p><ul><li>360度旋轉能力</li><li>優異的穩定性</li><li>多種附件選擇</li><li>先進的安全系統</li></ul>',
                'introduction_en' => '<p>MAGNI RTH 6.51 is a high-performance rotating telescopic handler with a maximum working height of 51 meters.</p><p>Features include:</p><ul><li>360-degree rotation capability</li><li>Excellent stability</li><li>Multiple attachment options</li><li>Advanced safety systems</li></ul>',
            ],
            [
                'name_zh' => 'DOOSAN DX300LC-7 挖掘機',
                'name_en' => 'DOOSAN DX300LC-7 Excavator',
                'application_categories_info_id' => 1,
                'brands_info_id' => 3, // DOOSAN
                'product_categories_id' => 1, // 履帶式挖掘機
                'version' => 'DX300LC-7',
                'quick_bucket_changer' => true,
                'operating_converter' => true,
                'pdf' => 'doosan_dx300lc7_spec.pdf', // PDF 檔案
                'piping_zh' => '標準配管、特殊配管可客製',
                'piping_en' => 'Standard piping, custom options available',
                'glue_block_zh' => '標準膠塊、特殊膠塊可客製',
                'glue_block_en' => 'Standard rubber blocks, custom options available',
                'introduction_zh' => '<p>DOOSAN DX300LC-7 挖掘機是一款高效能的工程機械，專為各種挖掘工作設計。</p><p>特點包括：</p><ul><li>環保節能的發動機</li><li>優化的液壓系統</li><li>加強的底盤結構</li><li>舒適的駕駛環境</li></ul>',
                'introduction_en' => '<p>DOOSAN DX300LC-7 Excavator is a high-performance construction machine designed for various excavation tasks.</p><p>Features include:</p><ul><li>Eco-friendly engine</li><li>Optimized hydraulic system</li><li>Reinforced undercarriage structure</li><li>Comfortable operator environment</li></ul>',
            ],
            [
                'name_zh' => 'KOMATSU PW200-10 輪胎式挖掘機',
                'name_en' => 'KOMATSU PW200-10 Wheeled Excavator',
                'application_categories_info_id' => 1,
                'brands_info_id' => 4, // KOMATSU
                'product_categories_id' => 2, // 輪胎式挖掘機
                'version' => 'PW200-10',
                'quick_bucket_changer' => true,
                'operating_converter' => true,
                'pdf' => 'komatsu_pw200_spec.pdf', // PDF 檔案
                'piping_zh' => '標準配管、特殊配管可客製',
                'piping_en' => 'Standard piping, custom options available',
                'glue_block_zh' => '標準膠塊、特殊膠塊可客製',
                'glue_block_en' => 'Standard rubber blocks, custom options available',
                'introduction_zh' => '<p>KOMATSU PW200-10 是一款高效能的輪胎式挖掘機，特別適合城市建設和道路施工。</p><p>特點包括：</p><ul><li>高移動性</li><li>優異的穩定性</li><li>節能環保的發動機</li><li>多功能作業能力</li></ul>',
                'introduction_en' => '<p>KOMATSU PW200-10 is a high-performance wheeled excavator, particularly suitable for urban construction and road works.</p><p>Features include:</p><ul><li>High mobility</li><li>Excellent stability</li><li>Energy-efficient engine</li><li>Versatile operation capabilities</li></ul>',
            ],
            [
                'name_zh' => 'HITACHI ZX350LC-6 挖掘機',
                'name_en' => 'HITACHI ZX350LC-6 Excavator',
                'application_categories_info_id' => 1,
                'brands_info_id' => 5, // HITACHI
                'product_categories_id' => 1, // 履帶式挖掘機
                'version' => 'ZX350LC-6',
                'quick_bucket_changer' => true,
                'operating_converter' => true,
                'pdf' => 'hitachi_zx350lc6_spec.pdf', // PDF 檔案
                'piping_zh' => '標準配管、特殊配管可客製',
                'piping_en' => 'Standard piping, custom options available',
                'glue_block_zh' => '標準膠塊、特殊膠塊可客製',
                'glue_block_en' => 'Standard rubber blocks, custom options available',
                'introduction_zh' => '<p>HITACHI ZX350LC-6 挖掘機結合了高效率和可靠性，適合各種中大型挖掘工程。</p><p>特點包括：</p><ul><li>強大的挖掘力</li><li>優異的耐用性</li><li>節能環保的設計</li><li>先進的操控系統</li></ul>',
                'introduction_en' => '<p>HITACHI ZX350LC-6 Excavator combines efficiency and reliability, suitable for various medium to large excavation projects.</p><p>Features include:</p><ul><li>Powerful digging force</li><li>Exceptional durability</li><li>Energy-efficient design</li><li>Advanced control systems</li></ul>',
            ],
            [
                'name_zh' => 'CATERPILLAR D9T 推土機',
                'name_en' => 'CATERPILLAR D9T Bulldozer',
                'application_categories_info_id' => 1,
                'brands_info_id' => 6, // CATERPILLAR
                'product_categories_id' => 6, // 推土機
                'version' => 'D9T',
                'quick_bucket_changer' => false,
                'operating_converter' => true,
                'pdf' => 'caterpillar_d9t_spec.pdf', // PDF 檔案
                'piping_zh' => '標準配管、特殊配管可客製',
                'piping_en' => 'Standard piping, custom options available',
                'glue_block_zh' => '標準履帶膠塊',
                'glue_block_en' => 'Standard track pads',
                'introduction_zh' => '<p>CATERPILLAR D9T 是一款功能強大的推土機，適合大型土方工程和採礦作業。</p><p>特點包括：</p><ul><li>卓越的推土能力</li><li>堅固耐用的結構</li><li>高效能動力系統</li><li>優化的燃油效率</li></ul>',
                'introduction_en' => '<p>CATERPILLAR D9T is a powerful bulldozer suitable for large earthmoving projects and mining operations.</p><p>Features include:</p><ul><li>Exceptional pushing capability</li><li>Robust and durable construction</li><li>High-performance power system</li><li>Optimized fuel efficiency</li></ul>',
            ],
            [
                'name_zh' => 'VOLVO L120H 裝載機',
                'name_en' => 'VOLVO L120H Wheel Loader',
                'application_categories_info_id' => 1,
                'brands_info_id' => 7, // VOLVO
                'product_categories_id' => 7, // 裝載機
                'version' => 'L120H',
                'quick_bucket_changer' => true,
                'operating_converter' => true,
                'pdf' => 'volvo_l120h_spec.pdf', // PDF 檔案
                'piping_zh' => '標準配管系統',
                'piping_en' => 'Standard piping system',
                'glue_block_zh' => '高耐磨輪胎',
                'glue_block_en' => 'High wear-resistant tires',
                'introduction_zh' => '<p>VOLVO L120H 是一款多功能的輪式裝載機，適合各種物料搬運任務。</p><p>特點包括：</p><ul><li>高效的裝載性能</li><li>低油耗設計</li><li>操作人員友好的駕駛艙</li><li>優異的穩定性和機動性</li></ul>',
                'introduction_en' => '<p>VOLVO L120H is a versatile wheel loader suitable for various material handling tasks.</p><p>Features include:</p><ul><li>Efficient loading performance</li><li>Low fuel consumption design</li><li>Operator-friendly cabin</li><li>Excellent stability and maneuverability</li></ul>',
            ],

            // 液壓配件 (application_categories_info_id = 2)
            [
                'name_zh' => 'REXROTH A4VG 液壓泵',
                'name_en' => 'REXROTH A4VG Hydraulic Pump',
                'application_categories_info_id' => 2,
                'brands_info_id' => 8, // REXROTH
                'product_categories_id' => 9, // 液壓泵
                'version' => 'A4VG',
                'quick_bucket_changer' => false,
                'operating_converter' => false,
                'pdf' => 'rexroth_a4vg_spec.pdf', // PDF 檔案
                'piping_zh' => '多種接口規格',
                'piping_en' => 'Multiple interface specifications',
                'glue_block_zh' => '高耐磨密封件',
                'glue_block_en' => 'High wear-resistant seals',
                'introduction_zh' => '<p>REXROTH A4VG 液壓泵是一款高性能的液壓元件，廣泛應用於各類工程機械和工業設備。</p><p>特點包括：</p><ul><li>高壓力輸出</li><li>高效率設計</li><li>精確的流量控制</li><li>耐用可靠的結構</li></ul>',
                'introduction_en' => '<p>REXROTH A4VG Hydraulic Pump is a high-performance hydraulic component widely used in various construction machinery and industrial equipment.</p><p>Features include:</p><ul><li>High pressure output</li><li>High efficiency design</li><li>Precise flow control</li><li>Durable and reliable structure</li></ul>',
            ],
            [
                'name_zh' => 'REXROTH 比例閥',
                'name_en' => 'REXROTH Proportional Valve',
                'application_categories_info_id' => 2,
                'brands_info_id' => 8, // REXROTH
                'product_categories_id' => 10, // 液壓閥
                'version' => 'DBETX',
                'quick_bucket_changer' => false,
                'operating_converter' => false,
                'pdf' => 'rexroth_dbetx_spec.pdf', // PDF 檔案
                'piping_zh' => '標準接口',
                'piping_en' => 'Standard interface',
                'glue_block_zh' => '高品質密封材料',
                'glue_block_en' => 'High-quality sealing materials',
                'introduction_zh' => '<p>REXROTH 比例閥是液壓系統中的關鍵控制元件，提供精確的流量和壓力控制。</p><p>特點包括：</p><ul><li>電子比例控制</li><li>高響應速度</li><li>精確的控制特性</li><li>穩定的性能表現</li></ul>',
                'introduction_en' => '<p>REXROTH Proportional Valve is a key control component in hydraulic systems, providing precise flow and pressure control.</p><p>Features include:</p><ul><li>Electronic proportional control</li><li>High response speed</li><li>Precise control characteristics</li><li>Stable performance</li></ul>',
            ],
            [
                'name_zh' => 'PARKER F12 液壓馬達',
                'name_en' => 'PARKER F12 Hydraulic Motor',
                'application_categories_info_id' => 2,
                'brands_info_id' => 9, // PARKER
                'product_categories_id' => 13, // 液壓馬達
                'version' => 'F12',
                'quick_bucket_changer' => false,
                'operating_converter' => false,
                'pdf' => 'parker_f12_spec.pdf', // PDF 檔案
                'piping_zh' => '標準接口，多種選擇',
                'piping_en' => 'Standard interface, multiple options',
                'glue_block_zh' => '特殊密封材料',
                'glue_block_en' => 'Special sealing materials',
                'introduction_zh' => '<p>PARKER F12 液壓馬達是一款高性能的液壓驅動元件，適用於各種需要動力輸出的場合。</p><p>特點包括：</p><ul><li>高扭矩輸出</li><li>高效率運行</li><li>寬範圍轉速控制</li><li>堅固耐用設計</li></ul>',
                'introduction_en' => '<p>PARKER F12 Hydraulic Motor is a high-performance hydraulic drive component suitable for various power output applications.</p><p>Features include:</p><ul><li>High torque output</li><li>High efficiency operation</li><li>Wide range speed control</li><li>Robust and durable design</li></ul>',
            ],
            [
                'name_zh' => 'EATON 液壓缸',
                'name_en' => 'EATON Hydraulic Cylinder',
                'application_categories_info_id' => 2,
                'brands_info_id' => 10, // EATON
                'product_categories_id' => 11, // 液壓缸
                'version' => 'HC-101',
                'quick_bucket_changer' => false,
                'operating_converter' => false,
                'pdf' => 'eaton_hc101_spec.pdf', // PDF 檔案
                'piping_zh' => '標準連接埠，可定制',
                'piping_en' => 'Standard ports, customizable',
                'glue_block_zh' => '高壓密封系統',
                'glue_block_en' => 'High-pressure sealing system',
                'introduction_zh' => '<p>EATON 液壓缸提供強大的線性運動和力量，適用於各種工業和移動應用。</p><p>特點包括：</p><ul><li>高強度鋼材結構</li><li>耐磨損表面處理</li><li>精確的位移控制</li><li>長壽命設計</li></ul>',
                'introduction_en' => '<p>EATON Hydraulic Cylinder provides powerful linear motion and force for various industrial and mobile applications.</p><p>Features include:</p><ul><li>High-strength steel construction</li><li>Wear-resistant surface treatment</li><li>Precise displacement control</li><li>Long service life design</li></ul>',
            ],

            // 農業機械 (application_categories_info_id = 3)
            [
                'name_zh' => 'JOHN DEERE 6R 系列拖拉機',
                'name_en' => 'JOHN DEERE 6R Series Tractor',
                'application_categories_info_id' => 3,
                'brands_info_id' => 12, // JOHN DEERE
                'product_categories_id' => 15, // 拖拉機
                'version' => '6195R',
                'quick_bucket_changer' => true,
                'operating_converter' => true,
                'pdf' => 'johndeere_6r_spec.pdf', // PDF 檔案
                'piping_zh' => '多功能液壓系統',
                'piping_en' => 'Multifunctional hydraulic system',
                'glue_block_zh' => '高耐磨輪胎',
                'glue_block_en' => 'High wear-resistant tires',
                'introduction_zh' => '<p>JOHN DEERE 6R 系列拖拉機是現代農業的理想選擇，結合了強大的動力和舒適的操作體驗。</p><p>特點包括：</p><ul><li>高效能發動機</li><li>智能傳動系統</li><li>舒適的駕駛艙</li><li>多功能作業能力</li></ul>',
                'introduction_en' => '<p>JOHN DEERE 6R Series Tractor is an ideal choice for modern agriculture, combining powerful performance and comfortable operation experience.</p><p>Features include:</p><ul><li>High-performance engine</li><li>Intelligent transmission system</li><li>Comfortable cabin</li><li>Versatile operation capabilities</li></ul>',
            ],
            [
                'name_zh' => 'CLAAS LEXION 8900 收割機',
                'name_en' => 'CLAAS LEXION 8900 Harvester',
                'application_categories_info_id' => 3,
                'brands_info_id' => 13, // CLAAS
                'product_categories_id' => 16, // 收割機
                'version' => 'LEXION 8900',
                'quick_bucket_changer' => false,
                'operating_converter' => true,
                'pdf' => 'claas_lexion8900_spec.pdf', // PDF 檔案
                'piping_zh' => '高效液壓系統',
                'piping_en' => 'High-efficiency hydraulic system',
                'glue_block_zh' => '特殊履帶設計',
                'glue_block_en' => 'Special track design',
                'introduction_zh' => '<p>CLAAS LEXION 8900 是一款高性能聯合收割機，為大規模農場提供高效收穫解決方案。</p><p>特點包括：</p><ul><li>大容量穀物箱</li><li>高效的脫粒系統</li><li>智能操控技術</li><li>舒適的駕駛環境</li></ul>',
                'introduction_en' => '<p>CLAAS LEXION 8900 is a high-performance combine harvester providing efficient harvesting solutions for large-scale farms.</p><p>Features include:</p><ul><li>Large capacity grain tank</li><li>Efficient threshing system</li><li>Intelligent control technology</li><li>Comfortable driving environment</li></ul>',
            ],
            [
                'name_zh' => 'NEW HOLLAND T7 系列拖拉機',
                'name_en' => 'NEW HOLLAND T7 Series Tractor',
                'application_categories_info_id' => 3,
                'brands_info_id' => 14, // NEW HOLLAND
                'product_categories_id' => 15, // 拖拉機
                'version' => 'T7.315',
                'quick_bucket_changer' => true,
                'operating_converter' => true,
                'pdf' => 'newholland_t7_spec.pdf', // PDF 檔案
                'piping_zh' => '電子控制液壓系統',
                'piping_en' => 'Electronically controlled hydraulic system',
                'glue_block_zh' => '高耐磨農用輪胎',
                'glue_block_en' => 'High wear-resistant agricultural tires',
                'introduction_zh' => '<p>NEW HOLLAND T7 系列拖拉機結合了強大的動力、卓越的燃油效率和操作舒適性。</p><p>特點包括：</p><ul><li>先進的發動機技術</li><li>智能化動力管理</li><li>人體工學駕駛艙設計</li><li>精準農業系統兼容</li></ul>',
                'introduction_en' => '<p>NEW HOLLAND T7 Series Tractor combines powerful performance, excellent fuel efficiency and operational comfort.</p><p>Features include:</p><ul><li>Advanced engine technology</li><li>Intelligent power management</li><li>Ergonomic cabin design</li><li>Precision farming system compatibility</li></ul>',
            ],

            // 環保能源 (application_categories_info_id = 4)
            [
                'name_zh' => 'VESTAS V150-4.2 風力發電機',
                'name_en' => 'VESTAS V150-4.2 Wind Turbine',
                'application_categories_info_id' => 4,
                'brands_info_id' => 16, // VESTAS
                'product_categories_id' => 21, // 風力發電機
                'version' => 'V150-4.2',
                'purchase_lease' => 'purchase', // 購買選項
                'quick_bucket_changer' => false,
                'operating_converter' => true,
                'pdf' => 'vestas_v150_spec.pdf', // PDF 檔案
                'piping_zh' => '高壓液壓系統',
                'piping_en' => 'High-pressure hydraulic system',
                'glue_block_zh' => '特殊耐候材料',
                'glue_block_en' => 'Special weather-resistant materials',
                'introduction_zh' => '<p>VESTAS V150-4.2 風力發電機是一款高效能的大型風力發電設備，適合各種風場環境。</p><p>特點包括：</p><ul><li>大葉片設計，提高發電效率</li><li>先進的控制系統</li><li>高可靠性設計</li><li>智能監控功能</li></ul>',
                'introduction_en' => '<p>VESTAS V150-4.2 Wind Turbine is a high-performance large-scale wind power generation equipment suitable for various wind farm environments.</p><p>Features include:</p><ul><li>Large blade design for improved power generation efficiency</li><li>Advanced control system</li><li>High reliability design</li><li>Intelligent monitoring functions</li></ul>',
            ],
            [
                'name_zh' => 'SIEMENS GAMESA SG 14-222 DD 風力發電機',
                'name_en' => 'SIEMENS GAMESA SG 14-222 DD Wind Turbine',
                'application_categories_info_id' => 4,
                'brands_info_id' => 17, // SIEMENS GAMESA
                'product_categories_id' => 21, // 風力發電機
                'version' => 'SG 14-222 DD',
                'purchase_lease' => 'lease', // 租賃選項
                'quick_bucket_changer' => false,
                'operating_converter' => true,
                'pdf' => 'siemens_sg14_spec.pdf', // PDF 檔案
                'piping_zh' => '海上專用液壓系統',
                'piping_en' => 'Offshore-specific hydraulic system',
                'glue_block_zh' => '特殊抗腐蝕材料',
                'glue_block_en' => 'Special corrosion-resistant materials',
                'introduction_zh' => '<p>SIEMENS GAMESA SG 14-222 DD 是一款為海上風電場設計的大功率風力發電機。</p><p>特點包括：</p><ul><li>大容量發電能力</li><li>直驅技術，減少維護需求</li><li>優化的葉片設計</li><li>先進的控制與監測系統</li></ul>',
                'introduction_en' => '<p>SIEMENS GAMESA SG 14-222 DD is a high-power wind turbine designed for offshore wind farms.</p><p>Features include:</p><ul><li>Large capacity power generation</li><li>Direct drive technology, reducing maintenance requirements</li><li>Optimized blade design</li><li>Advanced control and monitoring systems</li></ul>',
            ],
            [
                'name_zh' => 'SUNPOWER Maxeon 太陽能板',
                'name_en' => 'SUNPOWER Maxeon Solar Panel',
                'application_categories_info_id' => 4,
                'brands_info_id' => 19, // SUNPOWER
                'product_categories_id' => 22, // 太陽能設備
                'version' => 'Maxeon 5',
                'purchase_lease' => 'purchase', // 購買選項
                'quick_bucket_changer' => false,
                'operating_converter' => false,
                'pdf' => 'sunpower_maxeon_spec.pdf', // PDF 檔案
                'piping_zh' => '特殊接線系統',
                'piping_en' => 'Special wiring system',
                'glue_block_zh' => '高耐候性材料',
                'glue_block_en' => 'High weather-resistant materials',
                'introduction_zh' => '<p>SUNPOWER Maxeon 太陽能板是業界領先的高效光伏產品，適用於住宅、商業和公用事業規模項目。</p><p>特點包括：</p><ul><li>高轉換效率</li><li>優異的弱光性能</li><li>出色的耐用性和可靠性</li><li>美觀的設計</li></ul>',
                'introduction_en' => '<p>SUNPOWER Maxeon Solar Panel is an industry-leading high-efficiency photovoltaic product suitable for residential, commercial, and utility-scale projects.</p><p>Features include:</p><ul><li>High conversion efficiency</li><li>Excellent low-light performance</li><li>Outstanding durability and reliability</li><li>Aesthetic design</li></ul>',
            ],
        ];

        // 從 assets 目錄複製預設產品圖片到 uploads 目錄
        $defaultImage = 'hot_pic.jpg';
        $sourcePath = public_path('assets/images/00-hp/'.$defaultImage);

        foreach ($products as $product) {
            // 創建產品資料
            $productData = ProductsInfo::create([
                'application_categories_info_id' => $product['application_categories_info_id'],
                'brands_info_id' => $product['brands_info_id'],
                'product_categories_id' => $product['product_categories_id'],
                'version' => $product['version'],
                'purchase_lease' => $product['purchase_lease'] ?? null, // 購買租賃選項，僅環保能源類別有值
                'quick_bucket_changer' => $product['quick_bucket_changer'],
                'operating_converter' => $product['operating_converter'],
                'pdf' => $product['pdf'], // PDF 檔案
            ]);

            // 多語系翻譯 - 中文
            $productData->translations()->create([
                'locale' => 'zh_TW',
                'name' => $product['name_zh'],
                'piping' => $product['piping_zh'],
                'glue_block' => $product['glue_block_zh'],
                'introduction' => $product['introduction_zh'],
            ]);

            // 多語系翻譯 - 英文
            $productData->translations()->create([
                'locale' => 'en',
                'name' => $product['name_en'],
                'piping' => $product['piping_en'],
                'glue_block' => $product['glue_block_en'],
                'introduction' => $product['introduction_en'],
            ]);

            // 建立產品圖片 (3張)
            for ($i = 1; $i <= 3; $i++) {
                $imageName = 'product_'.$productData->id.'_'.$i.'_'.Str::random(5).'.jpg';
                $destPath = $uploadPath.'/'.$imageName;

                if (File::exists($sourcePath)) {
                    File::copy($sourcePath, $destPath);
                } else {
                    $imageName = 'product_default.jpg';
                }

                ProductImage::create([
                    'product_id' => $productData->id,
                    'image_path' => 'products/'.$imageName,
                    'sort_order' => $i,
                ]);
            }
        }
    }
}
