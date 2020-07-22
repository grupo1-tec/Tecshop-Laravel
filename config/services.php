<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'facebook' => [
        'client_id' => '293791268639438',
        'client_secret' => '7e23169282631101cc8ec12e3915de7d',
        'redirect' => 'https://tecshop.gq/auth/facebook/callback'
    ],
    'google' => [
        'client_id' => '555362432967-pj93m8ini5r56ks60hail24adun7ff2p.apps.googleusercontent.com',
        'client_secret' => 'SxeIR9LuUTlZ7tSWdtOtFLjx',
        'redirect' => 'https://tecshop.gq/auth/google/callback'
    ]

];
