<?php

require_once __DIR__ . '/../../vendor/autoload.php';

defined('DS') or define('DS', DIRECTORY_SEPARATOR);

$config = require __DIR__ . '/../config/config.php';

function resource_path()
{
    return $GLOBALS['config']['cache.output_path'];
}

function set_divider($path)
{
    return str_replace('/', DS, $path);
}
