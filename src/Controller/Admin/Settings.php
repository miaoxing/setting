<?php

namespace Miaoxing\Setting\Controller\Admin;

class Settings extends \miaoxing\plugin\BaseController
{
    protected $controllerName = '设置';

    protected $actionPermissions = [
        'index,update' => '设置',
    ];

    public function indexAction()
    {
        $settings = wei()->setting()->asc('id')->findAll();
        $fieldSets = [];

        foreach ($settings as $setting) {
            $name = $setting->getTypeLabel();
            if (!$name) {
                continue;
            }

            if (!isset($fieldSets[$name])) {
                $fieldSets[$name] = [];
            }
            $fieldSets[$name][] = $setting;
        }

        $editorFields = wei()->setting->getOption('editorFields');

        return get_defined_vars();
    }

    public function updateAction($req)
    {
        wei()->setting->setValues((array) $req['settings']);

        return $this->suc();
    }
}
