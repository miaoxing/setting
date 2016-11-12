<?php

namespace MiaoxingTest\Setting\Service;

use Miaoxing\Plugin\Test\BaseTestCase;

/**
 * 设置服务
 */
class SettingTest extends BaseTestCase
{
    /**
     * 获取设置值
     */
    public function testGetValue()
    {
        $this->step('获取不存在的设置,返回null');
        $value = wei()->setting('not-exists');
        $this->assertNull($value);

        $this->step('获取不存在的设置,返回指定的默认值');
        $value = wei()->setting('not-exists', 'default');
        $this->assertEquals('default', $value);
    }
}
