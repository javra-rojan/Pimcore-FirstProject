<?php

namespace App\Controller;

use Pimcore\Model\Asset;
use Pimcore\Model\DataObject;
use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Pimcore\Bundle\AdminBundle\GDPR\DataProvider\DataObjects;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class BookController extends FrontendController
{
    /**
     * @Template
     *
     * 
     * @param Request $request
     *
     * @return array
     */
    public function showAction(Request $request)
    {
        return [];
    }

        
    /**
     * indexAction
     *
     * @Route("/home")
     * 
     */
    public function indexAction(){
        return new Response("home url");
    }
}
