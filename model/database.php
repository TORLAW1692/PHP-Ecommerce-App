<?php

// Database credentials are loaded from a private, Git-ignored local file.
function get_db_conn()
{
    $config_file = __DIR__ . '/database.local.php';

    if (!is_file($config_file)) {
        throw new RuntimeException(
            'Missing database configuration. Copy model/database.example.php to model/database.local.php and enter your local settings.'
        );
    }

    $config = require $config_file;

    if (!is_array($config)) {
        throw new RuntimeException('Local database configuration must return an array.');
    }

    foreach (['host', 'username', 'password', 'database'] as $key) {
        if (!array_key_exists($key, $config) || !is_string($config[$key])) {
            throw new RuntimeException('Missing or invalid database configuration field: ' . $key);
        }
    }

    return mysqli_connect(
        $config['host'],
        $config['username'],
        $config['password'],
        $config['database']
    );
}
