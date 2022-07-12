<?php

namespace Be\App\Contact;


class Property extends \Be\App\Property
{

    protected string $label = '联系我们';
    protected string $icon = 'el-icon-map-location';
    protected string $description = '联系我们';

    public function __construct() {
        parent::__construct(__FILE__);
    }

}
