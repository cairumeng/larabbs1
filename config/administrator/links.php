<?php

use App\Models\Link;
use Illuminate\Support\Facades\Auth;

return [
    'title'   => 'Resources Recommendation',
    'single'  => 'Resource',

    'model'   => Link::class,

    'permission' => function () {
        return Auth::user()->hasRole('Founder');
    },

    'columns' => [
        'id' => [
            'title' => 'ID',
        ],
        'title' => [
            'title'    => 'Resources',
            'sortable' => false,
        ],
        'link' => [
            'title'    => 'Link',
            'sortable' => false,
        ],
        'operation' => [
            'title'  => 'Manage',
            'sortable' => false,
        ],
    ],
    'edit_fields' => [
        'title' => [
            'title'    => 'resource',
        ],
        'link' => [
            'title'    => 'link',
        ],
    ],
    'filters' => [
        'id' => [
            'title' => 'resource ID',
        ],
        'title' => [
            'title' => 'resource',
        ],
    ],
];
