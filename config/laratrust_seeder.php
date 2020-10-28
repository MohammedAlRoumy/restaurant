<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
   // 'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
   // 'truncate_tables' => true,

    'role_structure' => [
        'super_admin' => [
            'categories' => 'c,r,u,d',
            'meals'=>'c,r,u,d',
            'ourteams'=>'c,r,u,d',
            'users' => 'c,r,u,d',
            'tables' => 'c,r,u,d',
            'aboutus' => 'c,r',
            'contactus' => 'r,d',
            'reservations'=> 'r,d',
        ],
        'admin' => [],
        'user' => [],
    ],
    'permission_structure' => [

    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
