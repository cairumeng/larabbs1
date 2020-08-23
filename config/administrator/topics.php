<?php

use App\Models\Topic;

return [
    'title'   => 'Topics',
    'single'  => 'Topic',
    'model'   => Topic::class,

    'columns' => [

        'id' => [
            'title' => 'ID',
        ],
        'title' => [
            'title'    => 'Topic',
            'sortable' => false,
            'output'   => function ($value, $model) {
                return '<div style="max-width:260px">' . model_link($value, $model) . '</div>';
            },
        ],
        'user' => [
            'title'    => 'Author',
            'sortable' => false,
            'output'   => function ($value, $model) {
                $avatar = $model->user->avatar;
                $value = empty($avatar) ? 'N/A' : '<img src="' . $avatar . '" style="height:22px;width:22px"> ' . $model->user->name;
                return model_link($value, $model->user);
            },
        ],
        'category' => [
            'title'    => 'Category',
            'sortable' => false,
            'output'   => function ($value, $model) {
                return model_admin_link($model->category->name, $model->category);
            },
        ],
        'reply_count' => [
            'title'    => 'Comments',
        ],
        'operation' => [
            'title'  => 'Manage',
            'sortable' => false,
        ],
    ],
    'edit_fields' => [
        'title' => [
            'title'    => 'topic',
        ],
        'user' => [
            'title'              => 'author',
            'type'               => 'relationship',
            'name_field'         => 'name',

            'autocomplete'       => true,

            'search_fields'      => ["CONCAT(id, ' ', name)"],

            'options_sort_field' => 'id',
        ],
        'category' => [
            'title'              => 'category',
            'type'               => 'relationship',
            'name_field'         => 'name',
            'search_fields'      => ["CONCAT(id, ' ', name)"],
            'options_sort_field' => 'id',
        ],
        'reply_count' => [
            'title'    => 'comment',
        ],
        'view_count' => [
            'title'    => 'view',
        ],
    ],
    'filters' => [
        'id' => [
            'title' => 'topic ID',
        ],
        'user' => [
            'title'              => 'user',
            'type'               => 'relationship',
            'name_field'         => 'name',
            'autocomplete'       => true,
            'search_fields'      => array("CONCAT(id, ' ', name)"),
            'options_sort_field' => 'id',
        ],
        'category' => [
            'title'              => 'category',
            'type'               => 'relationship',
            'name_field'         => 'name',
            'search_fields'      => array("CONCAT(id, ' ', name)"),
            'options_sort_field' => 'id',
        ],
    ],
    'rules'   => [
        'title' => 'required'
    ],
    'messages' => [
        'title.required' => 'Please fill the title!',
    ],
];
