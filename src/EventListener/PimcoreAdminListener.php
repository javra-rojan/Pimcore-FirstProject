<?php

namespace App\EventListener;
use Pimcore\Event\BundleManager\PathsEvent;

class PimcoreAdminListener{
    public function addJSFiles(PathsEvent  $event){
        $event->setPaths(
            array_merge(
                $event->getPaths(),
                [
//                    'Javra/TaskBundle/js/custom.js'
                ]
            )
        );
    }
}

