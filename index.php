<?php

require 'vendor/autoload.php';

use app\src\ClientSearch;
use app\src\repository\csv\CsvRepository;

$amount = $argv[1];

if (!$amount) {
    throw new \Exception('Amount not set.');
}

$clientSearch = new ClientSearch(new CsvRepository('data2.csv'));
$clientSearch->printByAmount($amount);
