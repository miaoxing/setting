<?php

namespace Miaoxing\Setting;

class Plugin extends \miaoxing\plugin\BasePlugin
{
    protected $name = '站点配置';

    protected $description = '';

    public function onAdminNavGetNavs(&$navs, &$categories, &$subCategories)
    {
        $categories['settings'] = [
            'name' => '设置',
            'sort' => 0,
        ];

        $subCategories['settings'] = [
            'parentId' => 'settings',
            'name' => '设置',
            'icon' => 'fa fa-cogs',
        ];

        $navs[] = [
            'parentId' => 'settings',
            'url' => 'admin/settings',
            'name' => '站点设置',
        ];
    }
}
