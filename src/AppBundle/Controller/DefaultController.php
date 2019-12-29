<?php

namespace AppBundle\Controller;



use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $a = 123;
        $someArray = [1,2,3];
        $someValue = false;
        return $this->render('@App/default/index.html.twig');
    }
    /**
     * @Route("/feedback", name="feedback")
     */
    public function feedbackAction(){
        return $this->render('@App/default/feedback.html.twig');
    }

    /**
     * @Route("/ajax", name="ajax")
     */
    public function ajaxAction(Request $request)
    {
        return $this->render('@App/default/index.html.twig',[
            'a' => $_GET['a']
        ]);

    }
}
