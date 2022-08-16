<?php
namespace Javra\ImportFromJsonBundle\Builder;

use Carbon\Carbon;
use Javra\ImportFromJsonBundle\Constants\Constants;
use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\DecorationModel;
use Pimcore\Model\DataObject\Fieldcollection;

class DecorationModelBuilder implements BuilderInterface {
    private $model, $orientation, $location, $methodFC;
    private $importPath;

    public function __construct($modelCode){
        $this->reset($modelCode);
        $this->importPath = DataObject::getByPath(Constants::storePath);
    }

    public function reset($modelCode){
        $this->model = new DecorationModel();
        $this->model->setParent( DataObject::getByPath(Constants::storePath));
        $this->model->setKey("Decoration " .rand(1,100). " " .Carbon::now());
        $this->model->setModelCode($modelCode);
        $this->model->save();
    }


    public function createObjectOrientations($orientation)
    {
        $this->orientation = new DataObject\Orientation();
        $this->orientation->setParent($this->importPath);
        $this->orientation->setKey('Orientation ' .rand(1,99). " " .Carbon::now());
        $this->orientation->setOrientationCode($orientation['OrientationCode']);
        $this->orientation->setDecorationModel($this->model);
        $this->orientation->save();
    }

    public function createCollectionMethods($methodCollections): Fieldcollection
    {
        $fieldCollection = new Fieldcollection();
        foreach ($methodCollections as $method){
            $this->methodFC = new Fieldcollection\Data\Method();
            $this->methodFC->setMethodCode($method['MethodCode']);
            $this->methodFC->setDefaultDecoration($method['DefaultDecoration']);
            $fieldCollection->add($this->methodFC);
        }
        return $fieldCollection;
    }

    public function createObjectLocations($location)
    {
        $this->location = new DataObject\Location();
        $this->location->setParent($this->importPath);
        $this->location->setKey('Location ' .rand(1,99). " " .Carbon::now());
        $this->location->setLocationCode($location['LocationCode']);
        $this->location->setCommImpNameCode((int)$location['CommImpNameCode']);
        $this->location->setCommImpLocationCode((int)$location['CommImpLocationCode']);
        $this->location->setOrientation($this->orientation);
        $this->location->setMethods($this->createCollectionMethods($location['Methods']));
        $this->location->save();
    }

}
