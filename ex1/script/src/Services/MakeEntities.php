<?php

namespace Tocc\One\Services;

use Tocc\One\Interfaces\FileInterface;
use Tocc\One\Interfaces\ReadFileInterface;

class MakeEntities
{
    public function execute(
        FileInterface $dataSourceFile,
        FileInterface $orderFile,
        FileInterface $customerFile,
        FileInterface $itemFile,
        FileInterface $orderItemFile,
        ReadFileInterface $reader
    )
    {
        while ($line = $reader->readNextLine($dataSourceFile->getFilePointer())){
            var_export($line);
        }
//        In progress
    }
}