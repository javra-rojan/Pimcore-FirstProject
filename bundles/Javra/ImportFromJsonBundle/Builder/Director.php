<?php

namespace Javra\ImportFromJsonBundle\Builder;

//directs sequence of method to be called
use Pimcore\Model\DataObject\Fieldcollection;

class Director{
    private BuilderInterface $builder;

    public function setBuilder( BuilderInterface $builder ){
        $this->builder = $builder;
    }

    public function buildDecorationModel($model){
        $orientations = $model['Orientations'];
        foreach( $orientations as $orientation){
            $this->builder->createObjectOrientations($orientation);
            $locations = $orientation["Locations"];
            foreach ( $locations as $location ){
                $this->builder->createObjectLocations($location);
            }
        }
    }
}
