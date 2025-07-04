<?php

namespace App\Http\Controllers;

use App\Models\Admin\VisitorLog;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    // // 進入計數頁面時，記錄訪問後回傳 view
    // public function count(Request $request)
    // {
    //     $ip = $request->ip();
    //     $today = date('Y-m-d');

    //     // 檢查是否已在今天記錄過此 IP
    //     $exists = VisitorLog::where('ip', $ip)
    //                 ->where('visit_date', $today)
    //                 ->exists();

    //     if (!$exists) {
    //         VisitorLog::create(['ip' => $ip, 'visit_date' => $today]);
    //     }

    //     // 取得總計數（所有符合條件的紀錄數）
    //     $count = VisitorLog::count();

    //     $countToday = VisitorLog::where('ip', $ip)
    //                 ->where('visit_date', $today)
    //                 ->count();

    //     return view('counter')->with('count', $count)->with('countToday', $countToday);
    // }

    // // API 回傳計數值（可供 ajax 載入最新計數）
    // public function getCount()
    // {
    //     $count = VisitorLog::count();
    //     return response()->json(['count' => $count]);
    // }

    // //
    // public function countToday(Request $request)
    // {
    //     $ip = $request->ip();
    //     $today = date('Y-m-d');
    //     $count = VisitorLog::where('ip', $ip)
    //                 ->where('visit_date', $today)
    //                 ->count();
    //     return response()->json(['count' => $count]);
    // }

    // public function getCountToday()
    // {
    //     $count = VisitorLog::where('visit_date', date('Y-m-d'))->count();
    //     return response()->json(['count' => $count]);
    // }
}
