<?php

namespace Javra\ImportFromJsonBundle\Controller;

use Pimcore\Controller\FrontendController;
use Pimcore\Model\DataObject;
use Pimcore\Model\Element\Service;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends FrontendController
{
    /**
     * @Route("/import_from_json")
     */
    public function indexAction(Request $request)
    {
        $records = Service::getElementByPath('object',"/ImportFromJson");
        $records->delete();
        return new Response('Delete');
    }
}
