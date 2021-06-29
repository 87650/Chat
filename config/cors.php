<?php

return [

    'paths' => ['api/*'],

    'allowed_methods' => ['GET, POST, PUT, PATCH, DELETE, OPTIONS'],

    'allowed_origins' => ['*'],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['Authorization,Accept,Origin,DNT,X-CustomHeader,Keep-Alive,User-Agent,X-Requested-With,If-Modified-Since,Cache-Control,Content-Type,Content-Range,Range'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false,

];
