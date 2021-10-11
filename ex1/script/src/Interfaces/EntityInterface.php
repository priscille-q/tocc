<?php

namespace Tocc\One\Interfaces;

interface EntityInterface
{
    public function formatHeader(array $header): array;

    public function formatData(array $header, array $line): array;
}