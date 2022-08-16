<?php

namespace Javra\TaskBundle\Controller;

use Google\Service\Analytics\Resource\Data;
use Google\Service\AndroidPublisher\Bundle;
use Pimcore\Model\DataObject\Book;
use Pimcore\Model\DataObject;
use Pimcore\Model\DataObject\Product;
use Pimcore\Controller\FrontendController;
use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Pimcore\Model\Version;

class DefaultController extends FrontendController
{

    private ?string $param = null;
    public function __construct(string $params){
        $this->param = $params;
    }
    /**
     * @Route("/javra_task")
     */
    public function indexAction(Request $request)
    {
//        $products = DataObject::getByPath('/Task');
//        if($products){
//            $products->delete();
//        }
        return new Response($_ENV['db_url']);
    }

    /**
     * @Route ("/javra_task/book/variant/create")
     * @param Request $request
     * @return Response
     * @throws \Exception
     */
    public function createBookVariantAction(Request $request){
        $books = new Book\Listing();
        foreach( $books as $book ){ break; }
        $variantObj = new Book();
        $variantObj->setParent($book);
        $variantObj->setCover_type("SoftCov");
        $variantObj->setKey($book->getKey(). " variant" .rand(1,20));
        $variantObj->setType(DataObject::OBJECT_TYPE_VARIANT);
        $variantObj->setPublished(true);
        $variantObj->save();
        return new Response("new variant added " .$variantObj->getKey(). "<br> to parent " .$book->getKey());
    }

    /**
     * @Route ("/javra_task/book/variant/show")
     * @param Request $request
     * @return void
     */
    public function showBooksVariantAction(Request $request){
        $books = new Book\Listing();
        foreach ( $books as $book ){
            $variants =  $book->getChildren([DataObject::OBJECT_TYPE_VARIANT]);
            print_r( $book->getKey(). ": " );
            foreach ( $variants as $variant ){
                print_r( ( $variant ? $variant->getCover_type(). ","  : '') );
            }
            print_r("<br>");
        }
        return new Response('list of books and variant');
    }
}
