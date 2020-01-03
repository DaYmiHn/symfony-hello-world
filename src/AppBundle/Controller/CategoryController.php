<?php


namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends Controller
{
    /**
     * @Route("/categories", name="category_list")
     * @Template()
     */
    public function indexAction(){
        $categories = $this
            ->getDoctrine()
            ->getRepository('AppBundle:Category')
            ->findBy([], ['name' => 'ASC']);
        return ['categories' => $categories];
    }


}