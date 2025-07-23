<?php

if (!function_exists('localized_route')) {
    /**
     * 生成帶有當前語系的路由 URL
     *
     * @param string $name 路由名稱
     * @param array $parameters 路由參數
     * @param bool $absolute 是否生成絕對 URL
     * @return string
     */
    function localized_route($name, $parameters = [], $absolute = true)
    {
        // 確保參數是陣列
        if (!is_array($parameters)) {
            $parameters = ['id' => $parameters];
        }

        // 添加當前語系作為參數
        $parameters['locale'] = app()->getLocale();

        // // 獲取目前所有查詢參數
        // $queryParams = request()->query();

        // // 合併路徑參數和查詢參數 (但不覆蓋已明確設定的參數)
        // $mergedParameters = array_merge($queryParams, $parameters);

        // // 如果沒有明確指定語系，才設定為當前語系
        // if (!isset($mergedParameters['locale'])) {
        //     $mergedParameters['locale'] = app()->getLocale();
        // }

        return route($name, $parameters, $absolute);
    }
}
