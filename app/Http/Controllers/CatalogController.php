<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatalogController extends Controller
{
    //
    public function download(Request $request)
    {
        // 檢查honeypot欄位
        if (!empty($request->input('website'))) {
            return response()->json([
                'success' => false,
                'message' => 'Bot detected'
            ], 403);
        }

        // 驗證表單數據
        $validated = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'location' => 'required',
            'product_id' => 'required',
            'product_pdf' => 'required',
        ]);

        // 儲存聯絡資訊到資料庫 (如有需要)
        // ...

        // 取得PDF檔案路徑
        $pdfPath = public_path('uploads/' . $request->product_pdf);

        // 回傳成功訊息和下載URL
        return response()->json([
            'success' => true,
            'download_url' => asset('uploads/' . $request->product_pdf)
        ]);
    }
}
