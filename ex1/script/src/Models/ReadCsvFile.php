<?php

namespace Tocc\One\Models;

use InvalidArgumentException;
use Tocc\One\Interfaces\ReadFileInterface;
use Tocc\One\Traits\IsPointerValid;

class ReadCsvFile implements ReadFileInterface
{
    use IsPointerValid;

    public function readNextLine($pointer)
    {
        if (!$this->isPointerValid($pointer)) {
            throw new InvalidArgumentException('Got an invalid file pointer');
        }
        return fgetcsv($pointer);
    }
}