<?php

use Fbsg\CSV\Writer as CSV;
use Fbsg\Data\DataMapper;
use Fbsg\Output;

require_once __DIR__ . '/start/start.php';

defined('DS') or define('DS', DIRECTORY_SEPARATOR);

$output = new Output;

/** @noinspection PhpIncludeInspection */
$mapping = require $config['mappings']['php'];

if (!is_file($config['mappings']['json'])) {
    file_put_contents($config['mappings']['json'], json_encode($mapping, JSON_PRETTY_PRINT));
}

$readers = [
    'accounts' => new CSV($config['csv']['files']['accounts']),
    'contacts' => new CSV($config['csv']['files']['contacts']),
];

$accountMapper = new DataMapper($mapping['accounts']);

$output->success("Reading CSV file for accounts ...");

try {
    $data = $accountMapper->mapAll($readers['accounts']->read());
    $output->success("Creating output csv ...");
    $readers['accounts']->write($data, $config['cache.output_dir'] . DS . 'accounts-' . (string)time() . '.csv');
    $output->success("Parsing data complete");
} catch (Exception $e) {
    $output->error($e->getMessage());
} finally {
    $output->success("Closing Program ...");
    exit(0);
}

