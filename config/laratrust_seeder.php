<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'administrator' => [
            'company' => 'c,r,u,d',
            'manager' => 'c,r,u,d',
            'user' => 'c,r,u,d',
            'sector' => 'c,r,u,d',
            'opportunity' => 'c,r,u,d',
        ],
        'manager' => [
            'company' => 'c,r,u,d',
            'user' => 'c,r,u,d',
            'sector' => 'c,r,u,d',
            'opportunity' => 'c,r,u',
        ],
        'external_salesman' => [
            'company' => 'c,r,u',
            'opportunity' => 'c,r',
        ],
        'internal_salesman' => [
            'company' => 'c,r,u',
            'opportunity' => 'c,r',
        ]
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
