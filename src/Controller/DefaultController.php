<?php

namespace App\Controller;

use Pimcore\Controller\FrontendController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends FrontendController
{
    /**
     * @Template
     * @Route("/")
     * @param Request $request
     *
     * @return array
     */
    public function defaultAction(Request $request)
    {
        return [
        ];
    }
}
