<?php

namespace Tocc\One\Models;

use Tocc\One\Interfaces\EntityInterface;

class Customer implements EntityInterface
{
    public function formatHeader(array $header): array
    {
        $headerCopy = array_flip($header);
        return [
            $headerCopy[$header['Customer Number']],
            $headerCopy[$header['First Name']],
            $headerCopy[$header['Family Name']]
        ];
    }

    public function formatData(array $header, array $line): array
    {
        return [
            $line[$header['Customer Number']],
            $line[$header['First Name']],
            $line[$header['Family Name']],
        ];
    }
}