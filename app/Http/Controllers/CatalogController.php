<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\CreateCatalogInfoRequest;
use App\Models\Admin\CatalogInfo;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    //
    public function download(CreateCatalogInfoRequest $request)
    {
        // 檢查honeypot欄位
        if (!empty($request->input('website'))) {
            return response()->json([
                'success' => false,
                'message' => 'Bot detected'
            ], 403);
        }

        // product_pdf欄位必須存在
        if (!$request->has('product_pdf') || empty($request->input('product_pdf'))) {
            return response()->json([
                'success' => false,
                'message' => 'Product PDF is Not Found'
            ], 422);
        }

        // 驗證表單數據
        // 儲存聯絡資訊到資料庫 (如有需要)
        $input = $request->all();

        // 取得PDF檔案路徑
        $pdfPathOriginal = $input['product_pdf'];
        // $pdfPath = public_path('uploads/' . $pdfPathOriginal);

        // 不包含 honeypot、product_pdf欄位
        unset($input['website'], $input['product_pdf']);

        CatalogInfo::create($input);

        // 回傳成功訊息和下載URL
        return response()->json([
            'success' => true,
            'download_url' => asset('uploads/' . $pdfPathOriginal)
        ]);
    }
}
