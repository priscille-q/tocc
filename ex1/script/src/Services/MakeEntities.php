<?php

namespace Tocc\One\Services;

use Exception;
use Tocc\One\Interfaces\FileInterface;
use Tocc\One\Interfaces\ReadFileInterface;
use Tocc\One\Interfaces\WriteFileInterface;
use Tocc\One\Models\Customer;
use Tocc\One\Models\Item;
use Tocc\One\Models\Order;
use Tocc\One\Models\OrderItem;

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
            throw new Exception('Invalid header');
        }
        $order = new Order();
        $writer->writeNextLine($orderFile->getFilePointer(), $order->formatHeader($this->header));
        $customer = new Customer();
        $writer->writeNextLine($customerFile->getFilePointer(), $customer->formatHeader($this->header));
        $item = new Item();
        $writer->writeNextLine($itemFile->getFilePointer(), $item->formatHeader($this->header));
        $orderItem = new OrderItem();
        $writer->writeNextLine($orderItemFile->getFilePointer(), $orderItem->formatHeader($this->header));
        while ($line = $reader->readNextLine($dataSourceFile->getFilePointer())) {
            $writer->writeNextLine($orderFile->getFilePointer(), $order->formatData($this->header, $line));
            $writer->writeNextLine($customerFile->getFilePointer(), $customer->formatData($this->header, $line));
            $writer->writeNextLine($itemFile->getFilePointer(), $item->formatData($this->header, $line));
            $writer->writeNextLine($orderItemFile->getFilePointer(), $orderItem->formatData($this->header, $line));
        }
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