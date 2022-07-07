<?php
namespace Javra\RojanBundle\Fixtures;

use Pimcore\Model\Asset;
use Pimcore\Model\DataObject;
use Javra\RojanBundle\Fixtures;
use Pimcore\Model\DataObject\Service;
use Pimcore\Model\DataObject\Category;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;

class DataFixture{
    private static $cat_name = array('Fiction', 'Romance', 'Sadistic', 'War', 'Friendship', 'Marriage', 'Mystey', 'Horror', 'Western', 'Fantasy', 'History', 'Comedy');
    private static $image_source = [
        "https://media.istockphoto.com/photos/global-connection-picture-id1335295270?s=612x612",
        "https://media.istockphoto.com/photos/on-a-road-trip-with-our-dog-picture-id1324381802?b=1&k=20&m=1324381802&s=170667a&w=0&h=x2JxCpUvXgcY0jcz06QFIXVm1uTFugV4iEjJXbIb4rI=",
        "https://images.unsplash.com/photo-1580273916550-e323be2ae537?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=764&q=80",
        "https://media.istockphoto.com/photos/happy-smiley-face-emoticon-on-white-background-picture-id1343130293?b=1&k=20&m=1343130293&s=170667a&w=0&h=WIf0gW3w8Uq8OP78juNKFRoERiWSreB6zQ5lN_j5koM=",
        "https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=686&q=80"
    ];

    public static function seedAsset(){
        for( $j = 0; $j < 10; $j++){
            $newAsset = new Asset();
            $newAsset->setFilename("book asset " .rand(1,99999));
            $newAsset->setData(file_get_contents(self::$image_source[array_rand(self::$image_source)]));
            $newAsset->setParentId(4);
            $newAsset->save();
            echo 'New Asset Data added => ' .$newAsset->getFileName(). '<br>';
        }
        echo "--------------ASSET SEEDING COMPLETED-----------------------";
    }

    public static function seedDataObject(){
        self::seedBook();
        self::seedCategory();
        self::attachCategoryToBook();
    }

    public static function seedBook(){
        for( $j = 0; $j < 10; $j++){
            $newObj = new DataObject\Book();
            //path set for parent folder
            $newObj->setParent(Service::createFolderByPath('Seed/Book'));
            $newObj->setKey("Book " .rand());
            $newObj->setTitle("book" .rand());
            $newObj->setImage(Asset::getById(51));
            $newObj->save();
            echo 'New data object BOOK added => ' .$newObj->getKey(). '<br>';
        }
        echo "--------------BOOK SEEDING COMPLETED-----------------------<br>";
    }

    public static function seedCategory(){
        $parent = Service::createFolderByPath('Seed/Category/CategorySeed ' .Carbon::now());
        for($i = 0; $i < count( self::$cat_name ); $i++){
            $newObj = new DataObject\Category();
            $newObj->setParent($parent);
            $newObj->setKey("Category " .$i);
            $newObj->setName(self::$cat_name[$i]);
            $newObj->setPublished(true);
            $newObj->save();
            echo 'New data object Category added ' .$newObj->getKey(). '<br>';
        }
        echo "--------------CATEGORY SEEDING COMPLETED-----------------------<br>";
    }

    public static function attachCategoryToBook(){
        //get list of category id
        $categories_id = self::getCategoriesIndices();

        //assign category to books
        $books = new DataObject\Book\Listing();
        $books->setUnpublished(true);
        $books->load();
        $loaded_cat_ids = [];
        foreach($books as $book)
        {
            $categories = [];
            $indices = array_rand($categories_id, 2);
            foreach($indices as $index){
                $id = $categories_id[$index];
//                if(in_array($id, $loaded_cat_ids)){
//                    continue;
//                }
                $loaded_cat_ids[] = $id;
                $categories[] = Dataobject\Category::getById($id);
            }
            echo "<br>";
            $book->setCategories($categories);
            $book->save();
            echo $book->getKey(). " category updated <br>";
        }
        echo "------------------Book category update successful------------<br>";
    }

    public static function getCategoriesIndices(){
        $cats = new DataObject\Category\Listing();
        $cats->setUnpublished(true);
        $cats->load();
        $categories_id = [];
        foreach( $cats as $cat )
        {
            $categories_id[] = $cat->getId();
        }
        return $categories_id;
    }
}
?>
