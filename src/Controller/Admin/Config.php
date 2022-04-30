<?php

namespace Be\App\Contact\Controller\Admin;

use Be\App\System\Controller\Admin\Auth;
use Be\Be;

/**
 * @BeMenuGroup("控制台", icon="el-icon-monitor", ordering="2")
 * @BePermissionGroup("控制台", icon="el-icon-monitor", ordering="2")
 */
class Config extends Auth
{
    /**
     * @BeMenu("参数", icon="el-icon-setting", ordering="2.1")
     * @BePermission("参数", ordering="2.1")
     */
    public function dashboard()
    {
        Be::getAdminPlugin('Config')->setting(['appName' => 'Contact', 'title' => '参数'])->execute();
    }
}
