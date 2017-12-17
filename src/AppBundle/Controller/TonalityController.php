<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Tonality;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Tonality controller.
 *
 * @Route("tonality")
 */
class TonalityController extends Controller
{
    /**
     * Lists all tonality entities.
     *
     * @Route("/", name="tonality_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $tonalities = $em->getRepository('AppBundle:Tonality')->findAll();

        return $this->render('tonality/index.html.twig', array(
            'tonalities' => $tonalities,
        ));
    }

    /**
     * Creates a new tonality entity.
     *
     * @Route("/new", name="tonality_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $tonality = new Tonality();
        $form = $this->createForm('AppBundle\Form\TonalityType', $tonality);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tonality);
            $em->flush();

            return $this->redirectToRoute('tonality_show', array('code' => $tonality->getCode()));
        }

        return $this->render('tonality/new.html.twig', array(
            'tonality' => $tonality,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a tonality entity.
     *
     * @Route("/{code}", name="tonality_show")
     * @Method("GET")
     */
    public function showAction(Tonality $tonality)
    {
        $deleteForm = $this->createDeleteForm($tonality);

        return $this->render('tonality/show.html.twig', array(
            'tonality' => $tonality,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing tonality entity.
     *
     * @Route("/{code}/edit", name="tonality_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Tonality $tonality)
    {
        $deleteForm = $this->createDeleteForm($tonality);
        $editForm = $this->createForm('AppBundle\Form\TonalityType', $tonality);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tonality_edit', array('code' => $tonality->getCode()));
        }

        return $this->render('tonality/edit.html.twig', array(
            'tonality' => $tonality,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a tonality entity.
     *
     * @Route("/{code}", name="tonality_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Tonality $tonality)
    {
        $form = $this->createDeleteForm($tonality);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tonality);
            $em->flush();
        }

        return $this->redirectToRoute('tonality_index');
    }

    /**
     * Creates a form to delete a tonality entity.
     *
     * @param Tonality $tonality The tonality entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Tonality $tonality)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tonality_delete', array('code' => $tonality->getCode())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
