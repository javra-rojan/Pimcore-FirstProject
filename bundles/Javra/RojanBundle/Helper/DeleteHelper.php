<?php

namespace Javra\RojanBundle\Helper;

use Pimcore\Model\Asset;
use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\Book;
use Pimcore\Model\DataObject\Category;

class DeleteHelper{
    private string $class_name;

    public function __construct($class_name){
        $this->class_name = $class_name;
    }

    public function deleteAssets(){
        //exclude deletion of root node
        $root_node_paths =  ['/', '/Book'];
        $assets = new Asset\Listing();
        $assets->load();
        foreach($assets as $asset)
        {
            if( ! in_array($asset->getFullPath(), $root_node_paths) ){
                echo $asset->getFileName(). " deleted";
                echo "<br>";
                $asset->delete();
            }
        }
        echo "Asset deleted successfully using " .$this->class_name. "<br>";
    }

    public function deleteDataObjects(){
        self::deleteBookObjects();
        self::deleteCategoryObjects();
    }

    private function deleteBookObjects(){
       //delete book
       $obj_list = new DataObject\Book\Listing();
       $obj_list->setUnpublished(true);
       // $objs->setCondition("title like 'Book%'");
       $obj_list->load();
       self::deleteObjects($obj_list);
       echo "Book objects deletion success!! <br>";
    }

    private function deleteCategoryObjects(){
        $obj_list = DataObject::getByPath('/Seed/Category');
//        $obj_list->load();
        self::deleteObjects($obj_list);
        echo "Category objects deletion success!! <br>";

    }

    private function deleteObjects($objs){
        foreach($objs as $obj)
        {
            echo $obj->getKey();
            echo "<br>";
            $obj->delete();
        }
    }
}
