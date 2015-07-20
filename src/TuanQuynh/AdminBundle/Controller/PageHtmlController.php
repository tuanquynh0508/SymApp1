<?php

namespace TuanQuynh\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class PageHtmlController extends Controller
{
    /**
     * @Route("/pagehtml")
     * @Template()
     */
    public function indexAction()
    {
    	$repository = $this->get('business.repository.page_html');
        $list = $repository->findAll();
        return array();
    }

    /**
     * @Route("/pagehtml/create")
     * @Template()
     */
    public function createAction()
    {
        //$repository = $this->get('business.repository.page_html');
        //$list = $repository->findAll();
        $form = $this->createForm('businessbundle_pagehtml');

        return array('form' => $form->createView());
    }
}
