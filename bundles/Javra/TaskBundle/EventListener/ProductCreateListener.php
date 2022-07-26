<?php
namespace Javra\TaskBundle\EventListener;

use Pimcore\Event\Model\AssetEvent;
use Pimcore\Model\DataObject\Product;
use Pimcore\Event\Model\DocumentEvent;
use Pimcore\Event\Model\DataObjectEvent;
use Pimcore\Event\Model\ElementEventInterface;

class ProductCreateListener {
    public function onObjectPreAdd( ElementEventInterface  $e ){
        if ( $e instanceof DataObjectEvent  && ($product = $e->getObject()) instanceof Product ){
            $product->setSku("P-" .rand(1,10000));
        }
    }
    public function onObjectPreUpdate (ElementEventInterface $e) {
        if ($e instanceof DataObjectEvent) {
            $foo = $e->getObject();
            if( $foo instanceof Product && $foo->getProduct_type() == 'simple'){
                $foo->getAccessories()->delete($foo);
            }
        }
    }

}
