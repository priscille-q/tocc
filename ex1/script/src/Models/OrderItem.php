<?php

namespace Tocc\One\Models;

use Tocc\One\Interfaces\EntityInterface;

class OrderItem implements EntityInterface
{
    public function formatHeader(array $header): array
    {
        $headerCopy = array_flip($header);
        return [
            $headerCopy[$header['Order Number']],
            $headerCopy[$header['Item Number']],
            $headerCopy[$header['Quantity']],
            $headerCopy[$header['Total']]
        ];
    }

    public function formatData(array $header, array $line): array
    {
        return [
            $line[$header['Order Number']],
            $line[$header['Description']],
            $line[$header['Quantity']],
            $line[$header['Total']]
        ];
    }
}