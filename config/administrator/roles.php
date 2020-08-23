<?php

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

return [
    'title'   => 'Roles',
    'single'  => 'Role',
    'model'   => Role::class,

    'permission' => function () {
        return Auth::user()->can('manage_users');
    },

    'columns' => [
        'id' => [
            'title' => 'ID',
        ],
        'name' => [
            'title' => 'Role'
        ],
        'permissions' => [
            'title'  => 'Permissions',
            'output' => function ($value, $model) {
                $model->load('permissions');
                $result = [];
                foreach ($model->permissions as $permission) {
                    $result[] = $permission->name;
                }

                return empty($result) ? 'N/A' : implode(' | ', $result);
            },
            'sortable' => false,
        ],
        'operation' => [
            'title'  => 'Manage',
            'output' => function ($value, $model) {
                return $value;
            },
            'sortable' => false,
        ],
    ],

    'edit_fields' => [
        'name' => [
            'title' => 'Role',
        ],
        'permissions' => [
            'type' => 'relationship',
            'title' => 'permissions',
            'name_field' => 'name',
        ],
    ],

    'filters' => [
        'id' => [
            'title' => 'ID',
        ],
        'name' => [
            'title' => 'role',
        ]
    ],

    'rules' => [
        'name' => 'required|max:15|unique:roles,name',
    ],

    'messages' => [
        'name.required' => 'Role could not be empty',
        'name.unique' => 'This role exsits already! ',
    ]
];
