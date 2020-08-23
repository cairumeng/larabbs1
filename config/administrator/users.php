<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;

return [
    'title'   => 'Users',

    'single'  => 'User',

    'model'   => User::class,

    'permission' => function () {
        return Auth::user()->can('manage_users');
    },

    'columns' => [

        'id',

        'avatar' => [
            'title'  => 'avatar',

            'output' => function ($avatar, $model) {
                return empty($avatar) ? 'N/A' : '<img src="' . $avatar . '" width="40">';
            },

            'sortable' => false,
        ],

        'name' => [
            'title'    => 'Name',
            'sortable' => false,
            'output' => function ($name, $model) {
                return '<a href="/users/' . $model->id . '" target=_blank>' . $name . '</a>';
            },
        ],

        'email' => [
            'title' => 'Email',
        ],

        'operation' => [
            'title'  => 'Manage',
            'sortable' => false,
        ],
    ],

    'edit_fields' => [
        'name' => [
            'title' => 'Name',
        ],
        'email' => [
            'title' => 'Email',
        ],
        'password' => [
            'title' => 'Password',

            'type' => 'password',
        ],
        'avatar' => [
            'title' => 'Avatar',
            'type' => 'image',
            'location' => public_path() . '/uploads/images/avatars/',
        ],
        'roles' => [
            'title'      => 'Roles',

            'type'       => 'relationship',

            'name_field' => 'name',
        ],
    ],

    'filters' => [
        'id' => [

            'title' => 'User ID',
        ],
        'name' => [
            'title' => 'User Name',
        ],
        'email' => [
            'title' => 'Email',
        ],
    ],
];
