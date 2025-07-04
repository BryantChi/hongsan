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
            $parameters = [$parameters];
        }

        // 添加當前語系作為參數
        $parameters['locale'] = app()->getLocale();

        return route($name, $parameters, $absolute);
    }
}
