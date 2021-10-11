<?php

namespace Tocc\One\Models;

use InvalidArgumentException;
use Tocc\One\Interfaces\WriteFileInterface;
use Tocc\One\Traits\IsPointerValid;

class WriteCsvFile implements WriteFileInterface
{
    use IsPointerValid;

    /**
     * @param $pointer
     * @param $line
     * @return false|int
     */
    public function writeNextLine($pointer, $line)
    {
        if (!$this->isPointerValid($pointer)) {
            throw new InvalidArgumentException('Got an invalid file pointer');
        }
        return fputcsv($pointer, $line);
    }
}