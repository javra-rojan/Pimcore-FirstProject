<?php

namespace Javra\TaskBundle\Controller;

use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\Product;
use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends FrontendController
{
    /**
     * @Route("/javra_task")
     */
    public function indexAction(Request $request)
    {
        $products = DataObject::getByPath('/Task');
        if($products){
            $products->delete();
        }
        return new Response('deleted ok');
    }
}
