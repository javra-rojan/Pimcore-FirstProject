<?php

namespace Javra\TaskBundle\Command;

use DateTime;
use DateTimeZone;
use Carbon\Carbon;
use Pimcore\Console\AbstractCommand;
use Pimcore\Model\DataObject\Product;
use Pimcore\Model\DataObject\Service;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class FileImportCommand extends AbstractCommand
{
    protected function configure()
    {
        $this
            ->setName('app:ImportCSVFile')
            ->setDescription('command to import CSV file');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    { 
        $time = Carbon::now();      
        $file = fopen('/home/rojan/Downloads/products.csv', "r");
        //dump first row
        fgetcsv($file);

        while( $row = fgetcsv($file) ){
            $this->createProduct($row, $time);
        }
        $output->writeln('Product CSV imported successfully!');
        fclose($file);
        return 0;
    }

    private function createProduct($row, $time){    
        $product = new Product();
        $product->setKey($row[0]);
        $product->setParent(Service::createFolderByPath('Task/CSVImport '. $time));
        $product->setName($row[0]);
        $product->setPrice((float)$row[1]);
        $product->setModel($row[2]);
        $product->setSKu($row[3]);
        $product->setStatus($row[4]);
        $product->setAdded_date( Carbon::parse( new DateTime(($row[5]), new DateTimeZone('Asia/Kathmandu')) ) );
        $product->setProduct_type($row[6]);
        $product->save(); 
    }
}