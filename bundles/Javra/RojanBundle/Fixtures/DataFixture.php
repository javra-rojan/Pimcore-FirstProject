<?php
namespace Javra\RojanBundle\Fixtures;

use Pimcore\Model\Asset;
use Pimcore\Model\DataObject;
use Javra\RojanBundle\Fixtures;
use Pimcore\Model\DataObject\Service;
use Pimcore\Model\DataObject\Category;
use Symfony\Component\HttpFoundation\Response;

class DataFixture{
    private static $cat_name = array('Fiction', 'Romance', 'Sadistic', 'War', 'Friendship', 'Marriage');

    public static function seedAsset(){
        for( $j = 0; $j < 10; $j++){
            $newAsset = new Asset();
            $newAsset->setFilename("book asset " .rand(1,100));
            $newAsset->setData(file_get_contents("https://media.istockphoto.com/photos/global-connection-picture-id1335295270?s=612x612"));
            $newAsset->setParentId(4);
            $newAsset->save();
            echo 'New Asset Data added => ' .$newAsset->getFileName(). '<br>';
        }
        echo "--------------ASSET SEEDING COMPLETED-----------------------";
    }

    public static function seedDataObject(){
        // self::seedBook();
        // self::seedCategory();
        self::attachCategoryToBook();
    }

    public static function seedBook(){
        for( $j = 0; $j < 10; $j++){
            $newObj = new DataObject\Book();
            //path set for parent folder
            $newObj->setParent(Service::createFolderByPath('Seed/Book')); 
            $newObj->setKey("Book " .rand(1,100));
            $newObj->setTitle("book" .rand());
            $newObj->setImage(Asset::getById(51));
            $newObj->save();
            echo 'New data object BOOK added => ' .$newObj->getKey(). '<br>';
        }
        echo "--------------BOOK SEEDING COMPLETED-----------------------";
    }
    public static function seedCategory(){
        for($i = 0; $i < count( self::$cat_name ); $i++){
            $newObj = new DataObject\Category();
            $newObj->setParent(Service::createFolderByPath('Seed/Category'));
            $newObj->setKey("Category " .$i);
            $newObj->setName(self::$cat_name[$i]);
            $newObj->setPublished(true);
            $newObj->save();
            echo 'New data object Category added ' .$newObj->getKey(). '<br>';
        }
        echo "--------------CATEGORY SEEDING COMPLETED-----------------------";
    }
    public static function attachCategoryToBook(){
        $cats = new DataObject\Category\Listing();
        $cats->setUnpublished(true);
        $cats->load();
        $categories_id = [];
        //get list of category id
        foreach( $cats as $cat )
        {
            $categories_id[] = $cat->getId();
        }
        
        //assign category to books
        $books = new DataObject\Book\Listing();
        $books->load();
        foreach($books as $book)
        {  
            $indices = array_rand($categories_id, 2);
            foreach($indices as $index){
                echo $categories_id[$index]. " ";
                $categories[] = Dataobject\Category::getById($categories_id[$index]);
            }
            echo "<br>";
            $book->setCategories($categories);
            $book->save();
            echo $book->getKey(). " category updated <br>";
        }
    }
}

?>