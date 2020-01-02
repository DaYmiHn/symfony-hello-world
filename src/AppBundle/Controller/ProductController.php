<?php


namespace AppBundle\Controller;


use AppBundle\Entity\Product;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends Controller
{
    /**
     * @Route("/products", name="product_list")
     * @Template()
     */
    public function indexAction(){
        $products = $this->getDoctrine()->getRepository('AppBundle:Product')->findAll();
        return ['products' => $products];
    }

    /**
     * @Route("/products/{id}", name="product_item", requirements={"id":"[0-9]+"})
     * @Template()
     */
    public function showAction($id){
        $product = $this->getDoctrine()->getRepository('AppBundle:Product')->find($id);
        if(!$product){
            throw $this->createNotFoundException('Product not found');
        }
        return ['product' => $product];
    }

    /**
     * @Route("/api/add", name="add_product")
     */
    public function addAction(){
        $entityManager = $this->getDoctrine()->getManager();

        $product = new Product();
        $product->setTitle('Fudji');
        $product->setPrice(19.99);
        $product->setCategory('Roman');
        $product->setDescription('Pelevin budist');

        // tells Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($product);
        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new product with id '.$product->getId());
    }
    /**
     * @Route("/api/update", name="update_product")
     */
    public function updateAction(){
        $entityManager = $this->getDoctrine()->getManager();
        $product = $entityManager->getRepository(Product::class)->find(6);
        $product->setDescription('OmG!!!');
        $entityManager->flush();

        return new Response('Update product with id '.$product->getId());
    }
    /**
     * @Route("/api/delete", name="delete_product")
     */
    public function deleteAction(){
        $entityManager = $this->getDoctrine()->getManager();
        $product = $entityManager->getRepository(Product::class)->find(5);
        $id = $product->getId();
        $entityManager->remove($product);
        $entityManager->flush();

        return new Response('Delete product with id '. $id);
    }
}