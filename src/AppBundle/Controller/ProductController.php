<?php


namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends Controller
{
    /**
     * @Route("/products", name="prduct_list")
     * @Template()
     */
    public function indexAction(){
        $products =[];
        for ($i = 1; $i <= 30; $i++){
            $products[]=rand(1,100);
        }

        return $this->render('@App/product/index.html.twig', ['products'=>$products]);
    return ['products' => $products];
    }

    /**
     * @Route("/products/{id}", name="product_item", requirements={"id":"[0-9]+"})
     */
    public function showAction($id){
        return $this->render('@App/product/show.html.twig',['id'=>$id]);
    }
}