<?php

return [

    'telegram' => [
        'api_token' => '',
        'bot_username' => '',
        'channel_username' => '', // Channel username to send message
        'channel_signature' => '', // This will be assigned in the footer of message
        'proxy' => false,   // True => Proxy is On | False => Proxy Off
    ],

    'twitter' => [
        'consurmer_key' => '',
        'consurmer_secret' => '',
        'access_token' => '',
        'access_token_secret' => ''
    ],

    'facebook' => [
        'app_id' => '360704275058129',
        'app_secret' => 'd4348387602aac9050420ff77572b639',
        'default_graph_version' => 'v2.3',
        'page_access_token' => 'EAAFIDwIvDdEBAAclEu9VtL4o5C3XJqftjd6PJP27iErqamIEZB14OiWke9xZCfJ7rd0X9SsgcimO0nFeA9KWYIk2agJnHjOkRRssnOFpUiqyQZAS6RAOSMPonJ3rsImX9I0rvHDmGqmH31CpxkZBiIX2ZAK74AOdWcyZCk68w9E7jZCnK5qgYETnxu17ASaue6cyqFeqH48TgZDZD'
    ],

    // Set Proxy for Servers that can not Access Social Networks due to Sanctions or ...
    'proxy' => [
        'type' => '',   // 7 for Socks5
        'hostname' => '', // localhost
        'port' => '' , // 9050
        'username' => '', // Optional
        'password' => '', // Optional
    ]
];
