<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller {

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request) {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
                    'base_dir' => realpath($this->container->getParameter('kernel.root_dir') . '/..'),
        ));
    }

    /**
     * @Route("/test/{name}/{family}/{age}")
     */
    public function setAction(Request $request) {

        $name = $request->get("name");
        $family = $request->get("family");
        $age = $request->get("age");
        $session=$request->getSession();
        $session->set("username","$name $family $age");
        return $this->redirectToRoute("say_hello");
    }
    /**
     * @Route("/hi",name="say_hello")
     */
    public function testAction(Request $request) {

        $session=$request->getSession();
        $name=$session->get("username");
        return $this->render("default/test.html.twig", array("name" => $name));
    }

}
