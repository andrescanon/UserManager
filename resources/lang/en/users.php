<?php

return [


    'flash_messages' => [
        'created' => '',
        'updated' => 'User was updated',
        'deleted' => '',
        'restored' => '',
        'forceDeleted' => ''
    ],

    'cards' => [
        'filter' => [
            'title' => 'Filter',
        ],
        'catalog' => [
            'title' => 'Catalog',
        ],
        'profile' => [
            'title' => 'Profile Detail',
        ],
        'activity' => [
            'title' => 'User Activity',
        ],
    ],

    'buttons' => [
        'edit' => 'Edit',
        'back' => 'Back',
        'show' => 'Show',
        'delete' => 'Delete',
        'search' => 'Search',
        'update' => 'Update',
    ],

    'columns' => [
        'id' => 'ID',
        'name' => 'Name',
        'email' => 'Email',
        'role' => 'Role',
        'created_at' => 'Created',
        'updated_at' => 'Updated',
        'actions' => 'Actions',
        'show' => 'Show',
        'edit' => 'Edit',
    ],

    'tooltips' => [
        'show' => 'Show',
        'edit' => 'Edit',
        'back' => 'Back',
        'delete' => 'Delete',
        'search' => 'Search',
        'update' => 'Update',


    ],

    'fields' => [
        'per_page' => [
            'label' => 'Limit',
            'placeholder' => 'Select or inter a pagination value...'
        ],
        'email' => [
            'label' => 'Email',
            'placeholder' => 'example@example.com',
            'helper' => 'Enter a valid email address...',
        ],
        'name' => [
            'label' => 'Name',
            'placeholder' => 'Enter text to search...',
            'helper' => 'Recommended input length :length characters'
        ],
        'password' => [
            'label' => 'Password',
            'placeholder' => 'Enter password...',
            'helper' => 'leave an empty field if you do not want to change'
        ],
        'password_confirmation' => [
            'label' => 'Password confirmation',
            'placeholder' => 'Confirm password...',
            'helper' => ''
        ],
        'role' => [
            'label' => 'Role',
            'placeholder' => 'Select role...',
            'helper' => 'Select one role'
        ],
    ],

];
