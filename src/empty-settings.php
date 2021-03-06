<?php
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the $

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
        ],

	// Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs',
            'level' => \Monolog\Logger::DEBUG,
        ],
	//Database settings (JJ)
        'db' => [
            'host'=> '127.0.0.1',
            'user' => '??',
            'pass' => '??',
            'dbname' => '??'
        ],
	'uploads' => [
            'uploads_path' => __DIR__ . '/../uploads/',
        ]
    ],
];
