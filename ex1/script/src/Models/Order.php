<?php

namespace Tocc\One\Models;

use Tocc\One\Interfaces\EntityInterface;

class Order implements EntityInterface
{
    public function formatHeader(array $header): array
    {
        $headerCopy = array_flip($header);
        return [
            $headerCopy[$header['Order Number']],
            $headerCopy[$header['Order Date']],
            $headerCopy[$header['Customer Number']]
        ];
    }

    public function formatData(array $header, array $line): array
    {
        return [
            $line[$header['Order Number']],
            $line[$header['Order Date']],
            $line[$header['Customer Number']],
        ];
    }
}