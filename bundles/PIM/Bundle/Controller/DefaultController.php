<?php

namespace PIM\Bundle\Controller;

use Pimcore\Bundle\AdminBundle\HttpFoundation\JsonResponse;
use Pimcore\Controller\FrontendController;
use Pimcore\Model\Asset;
use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\Book;
use Pimcore\Model\DataObject\Vehicle;
use Pimcore\Model\DataObject\Person;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends FrontendController
{
    /**
     * @Route("/pim_relations")
     */
    public function indexAction(Request $request)
    {
        $person = Person::getById(1296);
        $vehicle = new Vehicle();
        $vehicle->setParent(DataObject::getByPath('/PIM-Relations/Vehicle'));
        $vehicle->setKey('Mercedes Benz');
        $vehicle->setPlate_number('Ba-1 ka' .rand(1000,10000));
        $vehicle->setOwner($person);
        $vehicle->setPublished(true);

        $vehicle->save();
        return new Response('ok');

    }

    /**
     * @Route("/pim_relations/metadata/book")
     *
     */
    public function metaBookAction(){
        $book = Book::getById(1277);
        $categories = $book->getCategories();
        foreach ($categories as $category) {
            $reference = $category;
        }
        $owner_classMetaData = new DataObject\Data\ObjectMetadata('metadata', ['text'], $reference);
        $owner_classMetaData->setText('set text metaadata');
        $book->setMetaData($owner_classMetaData);
        $book->save();
        return new Response('ok');

    }
    /**
     * @Route("/pim_relations/metadata/person")
     *
     */
    public function metaPersonAction(){
        $person = Person::getById(1296);
        $roles = $person->getRoles();
        foreach ($roles as $role) {
            $reference = $role;
        }
        $owner_classMetaData = new DataObject\Data\ObjectMetadata('metadata', ['text'], $reference);
        $owner_classMetaData->setText('set text metaadata');
        $person->setMetaData($owner_classMetaData);
        $person->save();
        return new Response('ok');
    }

    /**
     * @Route("/pim_relations/demo")
     *
     */
    public function showAction(){
        $person = Person::getById(1296);
        $owner_class = $person->getClass()->getFieldDefinition('vehicles');
        $ref_field = $owner_class->getOwnerFieldName();
        $ref_id = $owner_class->getOwnerClassId();
        $personVehicles = $person->getRelationData($ref_field, false, $ref_id);
        return new JsonResponse($personVehicles);
    }

    /**
     * @Route ("pimcore_relations/upload-assets")
     * @return JsonResponse
     * @throws \Exception
     */
    public function vehicleAssetUpload(){
        $urls = [
          'ford' =>  'https://www.investopedia.com/thmb/tVosIByhjPzXoL8Fhth9PgGxAIs=/1440x960/filters:fill(auto,1)/ford-F150-47c821065ecd4f58972c74f15deb926f.jpg',
            'toyota' => 'https://editorial01.shutterstock.com/preview-440/13014127fj/3754f93e/Shutterstock_13014127fj.jpg',
            'mercedes' => 'https://cdn.pixabay.com/photo/2016/12/03/18/57/car-1880381__340.jpg',
            'land_rover' => 'https://cdn.pixabay.com/photo/2017/01/28/16/03/range-rover-2015653_960_720.jpg'
        ];
        foreach ($urls as $key => $value) {
            $asset = new Asset();
            $asset->setFilename($key);
            $asset->setData(file_get_contents($value));
            $asset->setParent(Asset::getByPath('/Vehicle'));
            $asset->save();
            $assets[] = $asset;
        }
        return new JsonResponse($assets);
    }
}
