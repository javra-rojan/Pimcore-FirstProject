<?php

namespace Javra\RojanBundle\Command;

use Pimcore\Model\Asset;
use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\Book;
use Pimcore\Console\AbstractCommand;
use Pimcore\Model\DataObject\Listing;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class BookImageUpdateCommand extends AbstractCommand{

    public function configure()
    {
        $this->setName('app:BookImageAssetloadCommand')
                ->setDescription('upload image into book object');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $image = new Asset();
        $image->setParentId(4);
        $image->setFileName("BookAssetSeed");
        $image->setData(file_get_contents("https://images.unsplash.com/photo-1654720947098-5ab1fffc7d43?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxlZGl0b3JpYWwtZmVlZHwzNHx8fGVufDB8fHx8&auto=format&fit=crop&w=500&q=60"));
        $image->save();

        $output->writeln("Image created for object: " .$image->getFileName());

        $objects = new DataObject\Book\Listing();
        $objects->setUnpublished(true);
        $objects->load();
        foreach( $objects as $object ){
            $object->setImage(Asset::getById($image->getId()));
            $object->save();
            $output->writeln("Object " .$object->getId(). "updated with image");
        }

        $output->writeln("image update complete on Book");
        return 0;
    }
}

?>