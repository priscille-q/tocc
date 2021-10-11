<?php

namespace Tocc\One\Traits;

trait IsPointerValid
{
    public function isPointerValid($pointer): bool
    {
        return (is_resource($pointer) && get_resource_type($pointer) == 'stream');
    }
}