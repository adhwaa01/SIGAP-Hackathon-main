<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    */

    'postmark' => [
        'key' => env('POSTMARK_API_KEY'),
    ],

    'ses' => [
        'key'    => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    // AI Services
    'ai' => [
        'provider' => env('AI_PROVIDER', 'openai'), // 'openai' or 'claude'
    ],

    'openai' => [
        'key' => env('OPENAI_API_KEY'),
    ],

    'claude' => [
        'key' => env('CLAUDE_API_KEY'),
    ],

];
