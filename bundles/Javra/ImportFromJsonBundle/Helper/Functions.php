<?php

use Javra\ImportFromJsonBundle\Builder\DecorationModelBuilder;
use Javra\ImportFromJsonBundle\Builder\Director;
use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\Service;
use Javra\ImportFromJsonBundle\Constants\Constants;

function createObjectFromArray($models){
    $models = array_shift($models);
    $models = ( array_key_first($models) === "Models" ) ? array_shift($models) : null;
    $director = new Director();
    Service::createFolderByPath(Constants::storePath);

    foreach ($models  as $model) {
        $builder = new DecorationModelBuilder($model["ModelCode"]);
        $director->setBuilder($builder);
        $director->buildDecorationModel($model);
    }
}


