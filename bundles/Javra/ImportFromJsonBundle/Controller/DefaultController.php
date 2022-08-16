<?php

namespace Javra\ImportFromJsonBundle\Controller;

use Javra\ImportFromJsonBundle\DependencyInjection\ImportFromJsonExtension;
use Pimcore\Config\Config;
use Pimcore\Controller\FrontendController;
use Pimcore\Model\DataObject;
use Pimcore\Model\Element\Service;
use Symfony\Component\Config\ConfigCache;
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
        $config = $this->getParameter('services.default');
        var_dump($config);
//        $records = Service::getElementByPath('object',"/ImportFromJson");
//        $records->delete();
        return new Response('Delete');
    }
}
