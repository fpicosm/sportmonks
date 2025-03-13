<?php

return [

    'per_page' => env('SPORTMONKS_PER_PAGE', 50),

    'timezone' => env('SPORTMONKS_TIMEZONE') ?: env('APP_TIMEZONE') ?: 'UTC',

    'api_token' => env('SPORTMONKS_TOKEN'),

];
