<?php

namespace Javra\ImportFromJsonBundle\Builder;

use Pimcore\Model\DataObject\Fieldcollection;
use Pimcore\Model\DataObject\Fieldcollection\Data\Method;
use Pimcore\Model\DataObject\Location;
use Pimcore\Model\DataObject\Orientation;

interface  BuilderInterface{
    public  function createObjectOrientations(array $orientation);
    public  function createCollectionMethods(array $methodCollections);
    public  function createObjectLocations(array $location);
}
