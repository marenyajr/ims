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
        'admin' => [
            'users' => 'c,r,u,d',            
            'products' => 'c,r,u,d',
            'purchase_orders' => 'c,r,u,d',
        ],
        'supplier' => [
            'users' => 'c,r,u,d',
        ],
        'sales_person' => [
            'users' => 'r,u',
            'orders' => 'c,r,u'
        ],
       
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
    ],
];
