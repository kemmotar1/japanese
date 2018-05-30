<?php
use Phalcon\Config;
use Phalcon\Logger;

return new Config([
    'database' => [
        'adapter' => 'Mysql',
        'host' => '127.0.0.1',
        'username' => 'root',
        'password' => '',
        'dbname' => 'JAPANESEDEVDB'
    ],
    'application' => [
        'controllersDirFE' => APP_PATH . '/frontend/controllers/',
        'modelsDirFE'      => APP_PATH . '/frontend/models/',
        'viewsDirFE'       => APP_PATH . '/frontend/views/',
        'controllersDirBE' => APP_PATH . '/backend/controllers/',
        'modelsDirBE'      => APP_PATH . '/backend/models/',
        'viewsDirBE'       => APP_PATH . '/backend/views/',
        'formsDir'       => APP_PATH . '/forms/',
        'libraryDir'     => APP_PATH . '/library/',
        'cacheDir'       => BASE_PATH . '/cache/',
        'baseUri'        => '/',
        'publicUrl'      => 'japanese.dev.kemmotar.com',
        'cryptSalt'      => 'eEAfR|_&G&f,+vU]:jFr!!A&+71w1Ms9~8_4L!<@[N@DyaIP_2My|:+.u>/6m,$D'
    ],
    'mail' => [
        'fromName' => 'Japanese',
        'fromEmail' => 'japanese@kemmotar.com',
        'smtp' => [
            'server' => 'smtp.gmail.com',
            'port' => 587,
            'security' => 'tls',
            'username' => '',
            'password' => ''
        ]
    ],
    'amazon' => [
        'AWSAccessKeyId' => '',
        'AWSSecretKey' => ''
    ],
    'logger' => [
        'path'     => BASE_PATH . '/logs/',
        'format'   => '%date% [%type%] %message%',
        'date'     => 'D j H:i:s',
        'logLevel' => Logger::DEBUG,
        'filename' => 'application.log',
    ],
    // Set to false to disable sending emails (for use in test environment)
    'useMail' => false
]);