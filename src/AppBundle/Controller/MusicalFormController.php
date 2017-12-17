<?php

namespace AppBundle\Controller;

use AppBundle\Entity\MusicalForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Musicalform controller.
 *
 * @Route("musicalform")
 */
class MusicalFormController extends Controller
{
    /**
     * Lists all musicalForm entities.
     *
     * @Route("/", name="musicalform_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $musicalForms = $em->getRepository('AppBundle:MusicalForm')->findAll();

        return $this->render('musicalform/index.html.twig', array(
            'musicalForms' => $musicalForms,
        ));
    }

    /**
     * Creates a new musicalForm entity.
     *
     * @Route("/new", name="musicalform_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $musicalForm = new Musicalform();
        $form = $this->createForm('AppBundle\Form\MusicalFormType', $musicalForm);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($musicalForm);
            $em->flush();

            return $this->redirectToRoute('musicalform_show', array('id' => $musicalForm->getId()));
        }

        return $this->render('musicalform/new.html.twig', array(
            'musicalForm' => $musicalForm,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a musicalForm entity.
     *
     * @Route("/{id}", name="musicalform_show")
     * @Method("GET")
     */
    public function showAction(MusicalForm $musicalForm)
    {
        $deleteForm = $this->createDeleteForm($musicalForm);

        return $this->render('musicalform/show.html.twig', array(
            'musicalForm' => $musicalForm,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing musicalForm entity.
     *
     * @Route("/{id}/edit", name="musicalform_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, MusicalForm $musicalForm)
    {
        $deleteForm = $this->createDeleteForm($musicalForm);
        $editForm = $this->createForm('AppBundle\Form\MusicalFormType', $musicalForm);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('musicalform_edit', array('id' => $musicalForm->getId()));
        }

        return $this->render('musicalform/edit.html.twig', array(
            'musicalForm' => $musicalForm,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a musicalForm entity.
     *
     * @Route("/{id}", name="musicalform_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, MusicalForm $musicalForm)
    {
        $form = $this->createDeleteForm($musicalForm);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($musicalForm);
            $em->flush();
        }

        return $this->redirectToRoute('musicalform_index');
    }

    /**
     * Creates a form to delete a musicalForm entity.
     *
     * @param MusicalForm $musicalForm The musicalForm entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(MusicalForm $musicalForm)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('musicalform_delete', array('id' => $musicalForm->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
