<?php
namespace Be\App\Contact\Config;

/**
 * @BeConfig("留言")
 */
class Message
{

    /**
     * @BeConfigItem("是否启用",
     *     description="启用后在联系我们页面展示留言表单，接受用户提交留言",
     *     driver="FormItemSwitch"
     * )
     */
    public int $enable = 1;

    /**
     * @BeConfigItem("表单标题",
     *     driver="FormItemInput",
     *     ui="return ['form-item' => ['v-show' => 'formData.enable === 1']];"
     * )
     */
    public string $formTitle = '在线留言';

    /**
     * @BeConfigItem("名字必填",
     *     driver="FormItemSwitch",
     *     ui="return ['form-item' => ['v-show' => 'formData.enable === 1']];"
     * )
     */
    public int $nameRequired = 1;

    /**
     * @BeConfigItem("邮箱必填",
     *     driver="FormItemSwitch",
     *     ui="return ['form-item' => ['v-show' => 'formData.enable === 1']];"
     * )
     */
    public int $emailRequired = 1;

    /**
     * @BeConfigItem("手机号必填",
     *     driver="FormItemSwitch",
     *     ui="return ['form-item' => ['v-show' => 'formData.enable === 1']];"
     * )
     */
    public int $mobileRequired = 1;

}

