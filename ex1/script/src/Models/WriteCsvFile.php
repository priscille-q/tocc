<?php

namespace Tocc\One\Models;

use Tocc\One\Traits\IsPointerValid;

class WriteCsvFile
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