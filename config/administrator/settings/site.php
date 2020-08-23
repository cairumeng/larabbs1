<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;

return [
    'title' => 'Site Settings',

    'permission' => function () {
        return Auth::user()->hasRole('Founder');
    },

    'edit_fields' => [
        'site_name' => [
            'title' => 'site Name',

            'type' => 'text',

            'limit' => 50,
        ],
        'contact_email' => [
            'title' => 'contact email',
            'type' => 'text',
            'limit' => 50,
        ],
        'seo_description' => [
            'title' => 'SEO - Description',
            'type' => 'textarea',
            'limit' => 250,
        ],
        'seo_keyword' => [
            'title' => 'SEO - Keywords',
            'type' => 'textarea',
            'limit' => 250,
        ],
    ],

    'rules' => [
        'site_name' => 'required|max:50',
        'contact_email' => 'email',
    ],

    'messages' => [
        'site_name.required' => 'Please fill site name。',
        'contact_email.email' => 'please enter a right email address',
    ],

    'before_save' => function (&$data) {
        if (strpos($data['site_name'], 'Powered by LaraBBS') === false) {
            $data['site_name'] .= ' - Powered by LaraBBS';
        }
    },

    'actions' => [

        'clear_cache' => [
            'title' => 'update system cache',

            'messages' => [
                'active' => 'is clearing cache',
                'success' => 'cache is cleaned',
                'error' => 'Fail to clear the cache！',
            ],

            'action' => function (&$data) {
                \Artisan::call('cache:clear');
                return true;
            }
        ],
    ],
];
