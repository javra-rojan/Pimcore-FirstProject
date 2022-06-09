<?php
namespace Javra\RojanBundle\Fixtures;

use Pimcore\Model\Asset;
use Pimcore\Model\DataObject;
use Javra\RojanBundle\Fixtures;
use Symfony\Component\HttpFoundation\Response;

class DataFixture{
    private static int $i =0;
    private static int $j =0;

    public static function seedAsset(){
        $newAsset = new Asset();
        $newAsset->setFilename("book asset " .++self::$j);
        $newAsset->setData(file_get_contents("https://media.istockphoto.com/photos/global-connection-picture-id1335295270?s=612x612"));
        $newAsset->setParentId(4);
        $newAsset->save();
        echo 'New Asset Data added => ' .$newAsset->getFileName(). '<br>';
    }

    public static function seedDataObject(){
        $newObj = new DataObject\Book();
        $newObj->setParentId(4);
        $newObj->setKey("Book " .++self::$i);
        $newObj->setTitle("book" .rand());
        $newObj->setImage(Asset::getById(51));
        $newObj->save();
        echo 'New data object BOOK added => ' .$newObj->getKey(). '<br>';
    }
}

?>