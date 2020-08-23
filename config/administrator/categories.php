<?php

use App\Models\Category;
use Illuminate\Support\Facades\Auth;

return [
    'title'   => 'Categories',
    'single'  => 'Category',
    'model'   => Category::class,

    'action_permissions' => [
        'delete' => function () {
            return Auth::user()->hasRole('Founder');
        },
    ],

    'columns' => [
        'id' => [
            'title' => 'ID',
        ],
        'name' => [
            'title'    => 'Categories',
            'sortable' => false,
        ],
        'description' => [
            'title'    => 'Deacription',
            'sortable' => false,
        ],
        'operation' => [
            'title'  => 'Manage',
            'sortable' => false,
        ],
    ],
    'edit_fields' => [
        'name' => [
            'title' => 'content',
        ],
        'description' => [
            'title' => 'description',
            'type'  => 'textarea',
        ],
    ],
    'filters' => [
        'id' => [
            'title' => 'categoryID',
        ],
        'name' => [
            'title' => 'category',
        ],
        'description' => [
            'title' => 'description',
        ],
    ],
    'rules'   => [
        'name' => 'required|min:1|unique:categories'
    ],
    'messages' => [
        'name.unique'   => 'The category name does already exist!',
        'name.required' => 'The category name is required!',
    ],
];
