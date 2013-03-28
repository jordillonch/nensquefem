<?php

namespace NensQueFem\Bundle\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Pagerfanta\View\TwitterBootstrapView;
use NensQueFem\Bundle\FrontBundle\Form\SearchActivityType;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->searchAction();
    }

    public function searchAction()
    {
        $search_arr = array();
        $form_search = $this->createForm(new SearchActivityType(), $search_arr);

        $pager = array();
        $pager['currentPageResults'] = array();
        $pagerHtml = '';

        // if there are filters
        if($this->getRequest()->get($form_search->getName(), false)) {
            $form_search->bind($this->getRequest());
            if($form_search->isValid()) {
                $pager = $this->get('nensquefem.search')->getResultPager($form_search->getData(), $this->getRequest()->get('page', 1));

                // Paginator - route generator
                $me = $this;
                $params = $this->getRequest()->query->all();
                unset($params['page']);
                $routeGenerator = function($page) use ($me, $params)
                {
                    return $me->generateUrl('search', array_merge(array('page' => $page), $params));
                };

                // Paginator - view
                $view = new TwitterBootstrapView();
                $pagerHtml = $view->render($pager, $routeGenerator, array(
                    'proximity' => 3,
                    'prev_message' => 'Anterior',
                    'next_message' => 'Següent',
                ));
            }
        }

        return $this->render('NensQueFemFrontBundle:Default:search.html.twig', array(
            'pager'    => $pager,
            'pagerHtml'    => $pagerHtml,
            'form_search'   => $form_search->createView()
        ));
    }

    public function quiSomAction()
    {
        return $this->render('NensQueFemFrontBundle:Default:quiSom.html.twig', array());
    }

    public function contacteAction()
    {
        return $this->render('NensQueFemFrontBundle:Default:contacte.html.twig', array());
    }

}
