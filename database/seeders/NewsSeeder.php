<?php

namespace Database\Seeders;

use App\Models\Admin\NewsInfo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 確保上傳目錄存在
        $uploadPath = public_path('uploads/news');
        if (!File::exists($uploadPath)) {
            File::makeDirectory($uploadPath, 0755, true);
        }

        $news = [
            [
                'title_zh' => '案例分享—台北水下工程案',
                'title_en' => 'Case Study - Taipei Underwater Engineering Project',
                'content_zh' => '<p>台北市地下工程建設項目向鴻盛建設機械，採購了領先全球的建設機械。這個項目是台北市重要的基礎設施建設，需要最先進的挖掘和水下工程設備。</p><p>鴻盛提供的設備包括：</p><ul><li>LIEBHERR 水下挖掘機</li><li>特殊配管系統</li><li>水下作業附件</li></ul><p>這些設備使工程團隊能夠在複雜的水下環境中高效作業，大大提高了工程效率和安全性。工程團隊對鴻盛提供的設備和技術支援表示高度滿意。</p><p>這個案例再次證明了鴻盛在特殊工程領域的專業實力和全方位服務能力。</p>',
                'content_en' => '<p>The Taipei underground construction project purchased world-leading construction machinery from Hongsan Construction Machinery. This project is an important infrastructure development in Taipei City, requiring the most advanced excavation and underwater engineering equipment.</p><p>Equipment provided by Hongsan includes:</p><ul><li>LIEBHERR underwater excavators</li><li>Special piping systems</li><li>Underwater operation attachments</li></ul><p>These equipment enabled the engineering team to work efficiently in complex underwater environments, greatly improving project efficiency and safety. The engineering team expressed high satisfaction with the equipment and technical support provided by Hongsan.</p><p>This case once again demonstrates Hongsan\'s professional strength and comprehensive service capabilities in specialized engineering fields.</p>',
                'status' => true,
            ],
            [
                'title_zh' => '品牌故事集—麥格尼 MAGNI',
                'title_en' => 'Brand Story - MAGNI',
                'content_zh' => '<p>麥格尼自1950年代開始發跡，從同時擁有製造商與技術出身的皮特羅先生開始創立。經過數十年的發展，MAGNI已成為高空作業車領域的領導品牌之一。</p><p>MAGNI的發展歷程：</p><ul><li>1950年代 - 品牌創立</li><li>1980年代 - 推出首款旋轉伸縮高空作業車</li><li>2000年代 - 技術革新，引入電子控制系統</li><li>2010年至今 - 全球擴張，成為行業領導者</li></ul><p>MAGNI以其創新的設計、卓越的性能和可靠的品質在全球贏得了良好的聲譽。鴻盛建設機械作為MAGNI在台灣的授權代理商，提供完整的銷售、租賃和維修服務。</p>',
                'content_en' => '<p>MAGNI began to rise in the 1950s, founded by Mr. Pietro who had both manufacturing and technical backgrounds. After decades of development, MAGNI has become one of the leading brands in the field of aerial work platforms.</p><p>MAGNI\'s development history:</p><ul><li>1950s - Brand founding</li><li>1980s - Introduction of the first rotating telescopic handler</li><li>2000s - Technological innovation, introduction of electronic control systems</li><li>2010s to present - Global expansion, becoming an industry leader</li></ul><p>MAGNI has earned a good reputation worldwide for its innovative design, excellent performance, and reliable quality. Hongsan Construction Machinery, as MAGNI\'s authorized dealer in Taiwan, provides complete sales, leasing, and maintenance services.</p>',
                'status' => true,
            ],
            [
                'title_zh' => '鴻盛參加2024台北國際工程機械展',
                'title_en' => 'Hongsan Participates in 2024 Taipei International Construction Machinery Exhibition',
                'content_zh' => '<p>鴻盛建設機械公司很榮幸地宣布，我們將參加2024年台北國際工程機械展覽會。這是台灣建設機械領域最具影響力的展會之一。</p><p>在展會上，鴻盛將展示以下亮點：</p><ul><li>最新款LIEBHERR R 950挖掘機</li><li>MAGNI RTH 6.51旋轉伸縮高空作業車</li><li>DOOSAN DX300LC-7挖掘機</li><li>各種專業附件和配件</li></ul><p>此外，我們的技術專家團隊將現場提供產品諮詢和技術交流。我們誠摯邀請所有合作夥伴和客戶蒞臨我們的展位，體驗鴻盛提供的最新工程機械解決方案。</p><p>展會詳情：<br>時間：2024年9月15-18日<br>地點：台北南港展覽館<br>展位號：A-1234</p>',
                'content_en' => '<p>Hongsan Construction Machinery is pleased to announce that we will participate in the 2024 Taipei International Construction Machinery Exhibition. This is one of the most influential exhibitions in Taiwan\'s construction machinery field.</p><p>At the exhibition, Hongsan will showcase the following highlights:</p><ul><li>Latest LIEBHERR R 950 excavator</li><li>MAGNI RTH 6.51 rotating telescopic handler</li><li>DOOSAN DX300LC-7 excavator</li><li>Various professional attachments and accessories</li></ul><p>In addition, our team of technical experts will provide on-site product consultation and technical exchanges. We sincerely invite all partners and customers to visit our booth and experience the latest construction machinery solutions offered by Hongsan.</p><p>Exhibition details:<br>Time: September 15-18, 2024<br>Venue: Taipei Nangang Exhibition Center<br>Booth Number: A-1234</p>',
                'status' => true,
            ],
            [
                'title_zh' => '新產品發表—HITACHI ZX350LC-6 挖掘機',
                'title_en' => 'New Product Launch - HITACHI ZX350LC-6 Excavator',
                'content_zh' => '<p>鴻盛建設機械公司很高興宣布，我們已成為HITACHI ZX350LC-6挖掘機在台灣的授權代理商。這款挖掘機結合了高效率和可靠性，適合各種中大型挖掘工程。</p><p>HITACHI ZX350LC-6的主要特點：</p><ul><li>強大的挖掘力：最大挖掘力達到XXX kN</li><li>優異的耐用性：經過嚴格測試的關鍵組件</li><li>節能環保的設計：符合最新排放標準</li><li>先進的操控系統：精準液壓控制</li></ul><p>鴻盛將提供完整的銷售、租賃和售後服務支援。我們的技術團隊已接受HITACHI原廠培訓，能夠提供專業的技術支援和維修服務。</p><p>歡迎有興趣的客戶聯繫我們預約展示或詢問更多產品資訊。</p>',
                'content_en' => '<p>Hongsan Construction Machinery is pleased to announce that we have become the authorized dealer for HITACHI ZX350LC-6 excavators in Taiwan. This excavator combines efficiency and reliability, suitable for various medium to large excavation projects.</p><p>Key features of HITACHI ZX350LC-6:</p><ul><li>Powerful digging force: Maximum digging force of XXX kN</li><li>Exceptional durability: Rigorously tested key components</li><li>Energy-efficient design: Compliant with the latest emission standards</li><li>Advanced control systems: Precise hydraulic control</li></ul><p>Hongsan will provide complete sales, leasing, and after-sales service support. Our technical team has received training from HITACHI factory and can provide professional technical support and maintenance services.</p><p>Interested customers are welcome to contact us to schedule a demonstration or inquire about more product information.</p>',
                'status' => true,
            ],
        ];

        // 從 assets 目錄複製預設新聞圖片到 uploads 目錄
        $defaultImage = 'n_pic.jpg';
        $sourcePath = public_path('assets/images/00-hp/'.$defaultImage);

        foreach ($news as $item) {
            // 複製圖片到 uploads 目錄
            $imageName = 'news_'.Str::random(10).'.jpg';
            $destPath = $uploadPath.'/'.$imageName;

            if (File::exists($sourcePath)) {
                File::copy($sourcePath, $destPath);
            } else {
                $imageName = 'news_default.jpg';
            }

            // 創建新聞資料
            $newsData = NewsInfo::create([
                'cover_front_image' => 'news/'.$imageName,
                'status' => $item['status'],
            ]);

            // 多語系翻譯 - 中文
            $newsData->translations()->create([
                'locale' => 'zh_TW',
                'title' => $item['title_zh'],
                'content' => $item['content_zh'],
            ]);

            // 多語系翻譯 - 英文
            $newsData->translations()->create([
                'locale' => 'en',
                'title' => $item['title_en'],
                'content' => $item['content_en'],
            ]);
        }
    }
}
