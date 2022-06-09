<?php

namespace Javra\RojanBundle\Controller;

use Pimcore\Model\Asset;
use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\Book;
use Javra\RojanBundle\Helper\DeleteHelper;
use Pimcore\Controller\FrontendController;
use Pimcore\Model\DataObject\Book\Listing;
use Javra\RojanBundle\Fixtures\DataFixture;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends FrontendController
{
    /**
     * @Route("/javra_rojan/seed")
     */
    public function seed(Request $request)
    {
        for($i=0; $i<10; $i++){
            DataFixture::seedDataObject();
            DataFixture::seedAsset();
        }

        return new Response('Seedeed ok');
    }

    /**
     * @Route("/javra_rojan/books", name="bundle_book_list")
     * 
     */
    public function indexAction(DeleteHelper $helper)
    {   
        // $helper->checkHere();
        return new Response( '200' ) ;
    }

    /**
     * @Route("/javra_rojan/delete", name="book_delete")
     */
    public function deleteAction(DeleteHelper $deleter): Response
    {   
        $deleter->deleteDataObjects();
        $deleter->deleteAssets();
        return new Response('Delete Successfully');
    }


    /**
     * @Route("javra_rojan/thumbnail", name="book_thumbnail")
     */
    public function FunctionName()
    {
        $asset = Asset::getById(67);
        echo $asset->getThumbnail('book_thumb')->getHtml();
        exit;
    }
 
}
