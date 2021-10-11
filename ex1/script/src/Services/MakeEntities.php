<?php

namespace Tocc\One\Services;

use Tocc\One\Interfaces\FileInterface;
use Tocc\One\Interfaces\ReadFileInterface;
use Tocc\One\Interfaces\WriteFileInterface;

class MakeEntities
{
    private $header;

    public function execute(
        FileInterface $dataSourceFile,
        FileInterface $orderFile,
        FileInterface $customerFile,
        FileInterface $itemFile,
        FileInterface $orderItemFile,
        ReadFileInterface $reader,
        WriteFileInterface $writer
    ) {
        $header = $reader->readNextLine($dataSourceFile->getFilePointer());
        $this->header = array_flip($header);
        if (!$this->isHeaderValid()) {
            throw new \Exception('Invalid header');
        }
    }

    protected function formatDataForOrder(array $line): array
    {
        return [
        ];
    }

    protected function formatDataForCustomer(array $line): array
    {
        return [];
    }

    protected function formatDataForItem(array $line): array
    {
        return [];
    }

    protected function formatDataForOrderItem(array $line): array
    {
        return [];
    }

    private function isHeaderValid(): bool
    {
        return isset(
            $this->header['Order Number'],
            $this->header['Order Date'],
            $this->header['Customer Number'],
            $this->header['First Name'],
            $this->header['Family Name'],
            $this->header['Item Number'],
            $this->header['Description'],
            $this->header['Cost'],
            $this->header['Quantity'],
            $this->header['Total']
        );
    }
}