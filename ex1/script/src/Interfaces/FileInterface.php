<?php

namespace Tocc\One\Interfaces;

interface FileInterface
{
    public function openFile(string $filePath, string $mode = 'r');

    public function getFilePointer();

    public function closeFile();
}