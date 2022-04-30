<?php

namespace Be\App\Contact;


class Property extends \Be\App\Property
{

    protected $label = '联系我们';
    protected $icon = 'el-icon-map-location';
    protected $description = '联系我们';

    public function __construct() {
        parent::__construct(__FILE__);
    }

}
