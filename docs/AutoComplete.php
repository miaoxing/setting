<?php

namespace plugins\setting\docs {

    /**
     * @property    \Miaoxing\Plugin\Service\Setting $setting 设置
     * @method      mixed setting($id = null, $default = null) 初始化setting对象或获取某项配置
     */
    class AutoComplete
    {
    }
}

namespace {

    /**
     * @return \plugins\setting\docs\AutoComplete
     */
    function wei()
    {
    }

    $setting = wei()->setting;
}
