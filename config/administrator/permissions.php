<?php

use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

return [
    'title'   => 'Permissions',
    'single'  => 'Permission',
    'model'   => Permission::class,

    'permission' => function () {
        return Auth::user()->can('manage_users');
    },

    'action_permissions' => [
        'create' => function ($model) {
            return true;
        },
        'update' => function ($model) {
            return true;
        },
        'delete' => function ($model) {
            return false;
        },
        'view' => function ($model) {
            return true;
        },
    ],

    'columns' => [
        'id' => [
            'title' => 'ID',
        ],
        'name' => [
            'title'    => 'Permissions',
        ],
        'operation' => [
            'title'    => 'manage',
            'sortable' => true,
        ],
    ],

    'edit_fields' => [
        'name' => [
            'title' => 'Permissions',

            'hint' => 'Edit will change the code be careful to modify!'
        ],
        'roles' => [
            'type' => 'relationship',
            'title' => 'roles',
            'name_field' => 'name',
        ],
    ],

    'filters' => [
        'name' => [
            'title' => 'Permissions',
        ],
    ],
];
