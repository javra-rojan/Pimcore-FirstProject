<?php

use Javra\ImportFromJsonBundle\Builder\DecorationModelBuilder;
use Javra\ImportFromJsonBundle\Builder\Director;
use Pimcore\Model\DataObject;

function createObjectFromArray($models){
    $models = array_shift($models);
    $models = ( array_key_first($models) === "Models" ) ? array_shift($models) : null;
    $director = new Director();
    Pimcore\Model\DataObject\Service::createFolderByPath("/ImportFromJson");

    foreach ($models  as $model) {
        $builder = new DecorationModelBuilder($model["ModelCode"]);
        $director->setBuilder($builder);
        $director->buildDecorationModel($model);
    }
}

