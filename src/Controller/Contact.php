<?php

namespace Be\App\Contact\Controller;

use Be\Be;

/**
 * 联系我们
 */
class Contact
{

    /**
     * 联系我们
     *
     * @BeMenu("联系我们")
     * @BeRoute("/contact")
     */
    public function index()
    {
        $request = Be::getRequest();
        $response = Be::getResponse();

        $configContact = Be::getConfig('App.Contact.Contact');
        $response->set('configContact', $configContact);

        $response->set('title', $configContact->title);
        $response->set('meta_description', $configContact->metaDescription);
        $response->set('meta_keywords', $configContact->metaKeywords);

        $configMessage = Be::getConfig('App.Contact.Message');
        $response->set('configMessage', $configMessage);

        $response->display();
    }

    /**
     * 谷歌地图
     *
     * @BeRoute("/contact/google-map")
     */
    public function googleMap()
    {
        $request = Be::getRequest();
        $response = Be::getResponse();

        $configContact = Be::getConfig('App.Contact.Contact');
        $response->set('configContact', $configContact);

        $response->display();
    }

    /**
     * 百度地图
     *
     * @BeRoute("/contact/baidu-map")
     */
    public function baiduMap()
    {
        $request = Be::getRequest();
        $response = Be::getResponse();

        $configContact = Be::getConfig('App.Contact.Contact');
        $response->set('configContact', $configContact);

        $response->display();
    }


}
