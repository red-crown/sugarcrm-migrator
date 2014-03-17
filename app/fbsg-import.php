<?php

require_once __DIR__ . '/../vendor/autoload.php';

$mapping    = require __DIR__ . '/../resources/data/accounts-mapping.php';
$reader     = new \EasyCSV\Reader(__DIR__ . '/../resources/data/fbsg-accounts.csv');
$data       = $reader->getAll();
$mapper     = new \Fbsg\Data\DataMapper($mapping);
$mappedData = $mapper->mapAll($data);


$writer = new \EasyCSV\Writer(__DIR__ . '/../resources/cache/fbsg-accounts-output.csv');

$writer->writeRow(array_keys($mappedData[0]));
$writer->writeFromArray($mappedData);
