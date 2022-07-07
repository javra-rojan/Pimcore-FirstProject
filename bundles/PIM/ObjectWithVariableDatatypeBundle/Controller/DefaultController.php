<?php

namespace PIM\ObjectWithVariableDatatypeBundle\Controller;

use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends FrontendController
{
    /**
     * @Route("/object_with_variable_datatype")
     */
    public function indexAction(Request $request)
    {
        return new Response('Hello world from object_with_variable_datatype');
    }
}
