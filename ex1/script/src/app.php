<?php

use Tocc\One\Models\File;
use Tocc\One\Models\Parameter;
use Tocc\One\Models\ReadCsvFile;
use Tocc\One\Models\WriteCsvFile;
use Tocc\One\Services\MakeEntities;

$arg = Parameter::getOptionParameter($argv);

$filePath = array_shift($arg['parameter']);
$file = new File();
$file->openFile($filePath);

try {
    $orderFile = new File();
    $customerFile = new File();
    $itemFile = new File();
    $orderItemFile = new File();
    $orderFile->openFile(realpath('.') . '/order.csv', 'w');
    $customerFile->openFile(realpath('.') . '/customer.csv', 'w');
    $itemFile->openFile(realpath('.') . '/item.csv', 'w');
    $orderItemFile->openFile(realpath('.') . '/orderItem.csv', 'w');

    (new MakeEntities())->execute(
        $file,
        $orderFile,
        $customerFile,
        $itemFile,
        $orderItemFile,
        new ReadCsvFile(),
        new WriteCsvFile()
    );
    $orderFile->closeFile();
    $customerFile->closeFile();
    $itemFile->closeFile();
    $orderItemFile->closeFile();
} catch (Exception $e) {
    var_export($e->getMessage());
}