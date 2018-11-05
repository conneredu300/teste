<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        $request = Request::createFromGlobals();
        $array = array();

        $array = $request->query->all();

        return $this->render("index.html.twig", $array);
    }
}