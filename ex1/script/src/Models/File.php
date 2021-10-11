<?php

namespace Tocc\One\Models;

use Exception;
use Tocc\One\Traits\IsPointerValid;
use Tocc\One\Interfaces\FileInterface;

class File implements FileInterface
{
    use IsPointerValid;

    private $pointer;

    public function openFile(string $filePath, string $mode = 'r')
    {
        if (empty($filePath)) {
            throw new Exception('File path must be specified');
        }
        if (!$this->isFileValid($filePath, $mode)) {
            throw new Exception('Please verify if file exist or not, and if you have the right permission');
        }
        $pointer = fopen($filePath, $mode);
        if (!$this->isPointerValid($pointer)) {
            throw new Exception('Failed to open file \"' . $filePath . '\".');
        }
        $this->setFilePointer($pointer);
    }

    public function closeFile()
    {
        if ($this->isPointerValid($this->getFilePointer())) {
            fclose($this->getFilePointer());
        }
    }

    public function getFilePointer()
    {
        return $this->pointer;
    }

    /**
     * check file validity and permission
     * @param string $filePath
     * @param string $mode
     * @return bool
     */
    protected function isFileValid(string $filePath, string $mode = 'r'): bool
    {
        $char = substr($filePath, -1, 1);
        if ('/' === $char || '\\' === $char) {
            return false;
        }
        switch ($mode) {
            case 'r':
                return is_file($filePath) && is_readable($filePath);
            case 'r+':
            case 'w':
            case 'w+':
            case 'a':
            case 'a+':
            case 'c':
            case 'c+':
                $temp = explode('/', $filePath);
                unset($temp[count($temp) - 1]);
                return is_writable(implode('/', $temp));
            case 'x':
            case 'x+':
                return !file_exists($filePath);
            default:
                return false;
        }
    }

    private function setFilePointer($pointer)
    {
        $this->pointer = $pointer;
    }
}