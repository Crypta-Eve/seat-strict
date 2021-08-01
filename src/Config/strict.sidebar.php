<?php

/**
 * User: Crypta Electrica <crypta@crypta.tech>
 * Date: 05/08/2020.
 */

return [
    'strict' => [
        'name' => 'SeAT Strict',
        'icon' => 'fas fa-user-lock',
        'route_segment' => 'strict',
        'permission' => 'strict.configure',
        'entries' => [
            [
                'name' => 'Configure',
                'icon' => 'fas fa-cogs',
                'route' => 'strict.list',
                'permission' => 'strict.configure',
            ],
            [
                'name' => 'About',
                'icon' => 'fas fa-info',
                'route' => 'strict.about',
                'permission' => 'strict.configure',
            ],
        ],
    ],
];
