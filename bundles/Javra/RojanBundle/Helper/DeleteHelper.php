<?php

namespace Javra\RojanBundle\Helper;

use Pimcore\Model\Asset;
use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\Book;

class DeleteHelper{
    private string $class_name;

    public function __construct($class_name){
        $this->class_name = $class_name;
    }
    
    public function deleteAssets(){
        $assets = new Asset\Listing();
        $assets->setCondition("filename like 'book asset %'");
        foreach($assets as $asset)
        {
            echo $asset->getFileName();
            echo "<br>";
            $asset->delete();
        }
        echo "Asset deleted successfully using " .$this->class_name. "<br>";
    }

    public function deleteDataObjects(){
        $objs = new DataObject\Book\Listing();
        $objs->setUnpublished(true);
        $objs->setCondition("title like 'Book%'");
        $objs->load();
        foreach($objs as $obj)
        {   
            echo $obj->getTitle();
            echo "<br>";
            $obj->delete();
        }
        echo "object deleted successfully using " .$this->class_name. "<br>";
    }

}