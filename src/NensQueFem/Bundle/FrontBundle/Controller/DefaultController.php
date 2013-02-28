<?php

namespace NensQueFem\Bundle\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use NensQueFem\Bundle\FrontBundle\Form\SearchActivitatType;

class DefaultController extends Controller
{

    /**
     * @Route("/home", defaults={"url_search" = 1}, name="NQFFrontBundle_home")
     * @Route("/search", defaults={"url_search" = 1}, name="NQFFrontBundle_search")
     * @Route("/search/{url_search}", name="NQFFrontBundle_search_param")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function searchAction($url_search)
    {
        $peticion = $this->getRequest();

        $search_arr = array();
        $form_search   = $this->createForm(new SearchActivitatType(), $search_arr);

        $search_result_arr    = $this->get('nqf.search')->getResult($search_arr);

        return $this->render('NensQueFemFrontBundle:Default:home.html.twig', array(
            'search_result_arr'    => $search_result_arr,
            'form_search'   => $form_search->createView()
        ));
    }
}
