<?php

namespace Javra\ImportFromJsonBundle\Command;

use Pimcore\Console\AbstractCommand;
use Pimcore\Model\DataObject;
use Pimcore\Model\Element\Service;
use PSpell\Config;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class PublishImportCommand extends AbstractCommand{
    public function configure()
    {
        $this->setName('app:publish:imported:json')
            ->setDescription('Publish imported json data objects');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
//        $models = $this->getDecorationModels();
//        $this->getLocations();
//        $this->getOrientations();
        return 0;
    }
    private function getDecorationModels(){
        $decorationModels = new DataObject\DecorationModel\Listing();
        return $decorationModels;
    }

    private function getOrientations(){
        $orientations = new DataObject\Orientation\Listing();
        return $orientations;
    }

    private function  getLocations(){
        $locations = new DataObject\Location\Listing();
        return $locations;
    }

}
