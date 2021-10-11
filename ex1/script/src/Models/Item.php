<?php

namespace Tocc\One\Models;

use Tocc\One\Interfaces\EntityInterface;

class Item implements EntityInterface
{
    public function formatHeader(array $header): array
    {
        $headerCopy = array_flip($header);
        return [
            $headerCopy[$header['Item Number']],
            $headerCopy[$header['Description']],
            $headerCopy[$header['Cost']]
        ];
    }

    public function formatData(array $header, array $line): array
    {
        return [
            $line[$header['Item Number']],
            $line[$header['Description']],
            $line[$header['Cost']],
        ];
    }
}