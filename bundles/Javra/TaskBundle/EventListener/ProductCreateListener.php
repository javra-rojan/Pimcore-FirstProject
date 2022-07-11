<?php
namespace Javra\TaskBundle\EventListener;

use Pimcore\Event\Model\AssetEvent;
use Pimcore\Model\DataObject\Product;
use Pimcore\Event\Model\DocumentEvent;
use Pimcore\Event\Model\DataObjectEvent;
use Pimcore\Event\Model\ElementEventInterface;

class ProductCreateListener {

    public function onObjectPreUpdate (ElementEventInterface $e) {

    if ($e instanceof DataObjectEvent) {
            // do something with the object]
            $foo = $e->getObject();
            if( $foo instanceof Product){
                // var_dump($foo->getKey());
                // die;
//                $foo->setIs_simple(true);

            }
            // $foo->save();
            // $foo->setMyValue(microtime(true));
            // we don't have to call save here as we are in the pre-update event anyway ;-)
        }
    }
}
