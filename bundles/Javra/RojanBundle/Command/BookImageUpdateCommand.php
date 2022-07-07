<?php

namespace Javra\RojanBundle\Command;

use Pimcore\Model\Asset;
use Pimcore\Model\Asset\Image;
use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\Book;
use Pimcore\Console\AbstractCommand;
use Pimcore\Model\DataObject\Listing;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class BookImageUpdateCommand extends AbstractCommand{

    public function configure()
    {
        $this->setName('app:BookImageAssetLoadCommand')
                ->setDescription('upload image into book object');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        //get list of assets image
        $images = new Asset\Listing();
        $images->load();
        //store id of all images
        $images_id = [];
        foreach( $images as $image ){
            if( $image->getFullPath() == "/Book" ){
                continue;
            }
            $images_id[] = $image->getId();
        }


        $objects = new DataObject\Book\Listing();
        $objects->setUnpublished(true);
        $objects->load();
        foreach( $objects as $object ){
            $object->setPublished(true);
            $object->setImage(Asset::getById($images_id[array_rand($images_id)]));
            $object->save();
            $output->writeln("Object " .$object->getId(). "updated with image");
        }

        // $output->writeln("image update complete on Book");
        return 0;
    }
}

?>
