<?php

namespace TuanQuynh\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use TuanQuynh\BusinessBundle\Form\Type\PageHtmlType;
use TuanQuynh\BusinessBundle\Entity\PageHtml;

/**
 * @Route("/pagehtml")
 */
class PageHtmlController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
    	$pageHtmlRepository = $this->get('business.repository.page_html');

        $paginator = $pageHtmlRepository->getAllByPaginator();
        $paginator->setContainer($this->container);

        return array('paginator' => $paginator);
    }

    /**
     * @Route("/create")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function createAction(Request $request)
    {
		$oPageHtml = new PageHtml();
        $form = $this->createForm(new PageHtmlType(), $oPageHtml);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $oPageHtml = $form->getData();
                $oPageHtml->setCreatedAt();

                $pageHtmlRepository = $this->get('business.repository.page_html');
                $pageHtmlRepository->persistAndFlush($oPageHtml);

                $request->getSession()->getFlashBag()->add('success', 'Create record successful');
                return $this->redirect($this->generateUrl('tuanquynh_admin_pagehtml_edit', array('id' => $oPageHtml->getId())));
            }
        }

        return array(
			'entity' => $oPageHtml,
			'form' => $form->createView()
		);
    }

    /**
     * @Route("/edit/{id}", requirements={"id" = "\d+"})
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function editAction(Request $request, $id)
    {
        $pageHtmlRepository = $this->get('business.repository.page_html');
        $oPageHtml = $pageHtmlRepository->findOneById($id);
        if(null === $oPageHtml) {
            throw new HttpException(404, 'Record with id '.$id.' is not found');
        }

        $form = $this->createForm(new PageHtmlType(), $oPageHtml);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $oPageHtml = $form->getData();
                $oPageHtml->setUpdatedAt();

                $pageHtmlRepository->persistAndFlush($oPageHtml);

                $request->getSession()->getFlashBag()->add('success', 'Update record with id '.$oPageHtml->getId().' successful');
                return $this->redirect($this->generateUrl('tuanquynh_admin_pagehtml_edit', array('id' => $oPageHtml->getId())));
            }
        }

        return array(
			'entity' => $oPageHtml,
			'form' => $form->createView()
		);
    }

    /**
     * @Route("/delete/{id}", requirements={"id" = "\d+"})
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function deleteAction(Request $request, $id)
    {
        $pageHtmlRepository = $this->get('business.repository.page_html');
        $oPageHtml = $pageHtmlRepository->findOneById($id);
        if(null === $oPageHtml) {
            throw new HttpException(404, 'Record with id '.$id.' is not found');
        }

        $pageHtmlRepository->removeAndFlush($oPageHtml);
        $request->getSession()->getFlashBag()->add('warning', 'Delete record with id '.$id.' successful');
        return $this->redirect($this->generateUrl('tuanquynh_admin_pagehtml_index'));
    }
}
