<?php

namespace Be\App\Contact\Config\Page\Contact;

class index
{

    public int $west = 0;
    public int $center = 1;
    public int $east = 0;

    public array $centerSections = [
        [
            'name' => 'be-page-title',
        ],
        [
            'name' => 'be-page-content',
        ],
        [
            'name' => 'App.Contact.Message',
        ],
    ];


}
