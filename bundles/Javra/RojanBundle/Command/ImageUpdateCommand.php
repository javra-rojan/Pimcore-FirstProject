<?php

namespace Javra\RojanBundle\Command;

use Pimcore\Model\Asset;
use Pimcore\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ImageUpdateCommand extends AbstractCommand{

    public function configure(){
        $this->setName('app:ImageMetadataCommand')
                ->setDescription('update image');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {

        $images = new Asset\Listing();
        $images->setCondition("filename like 'book asset %'");

        foreach($images as $image){
            $output->writeln('Processing asset ' .$image->getId());
            $image->addMetadata('expire', 'date', time());
            $image->save();
        }
        $output->writeln('image update command executed successfully');
        return 0;
    }
}

?>
