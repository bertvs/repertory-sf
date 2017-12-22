<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Composition;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Composition controller.
 *
 * @Route("composition")
 */
class CompositionController extends Controller
{

    /**
     * Lists all composition entities.
     *
     * @Route("/", name="composition_index")
     * @Method("GET")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $compositionRepository = $em->getRepository('AppBundle:Composition');
        $compositions = $compositionRepository->findAll();

        return $this->render('composition/index.html.twig', array(
            'compositions' => $compositions,
        ));
    }

    /**
     * Creates a new composition entity.
     *
     * @Route("/new", name="composition_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $composition = new Composition();
        $form = $this->createForm('AppBundle\Form\CompositionType', $composition);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($composition);
            $em->flush();

            return $this->redirectToRoute('composition_show', array('id' => $composition->getId()));
        }

        return $this->render('composition/new.html.twig', array(
            'composition' => $composition,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a composition entity.
     *
     * @Route("/{id}", name="composition_show")
     * @Method("GET")
     */
    public function showAction(Composition $composition)
    {
        $deleteForm = $this->createDeleteForm($composition);

        return $this->render('composition/show.html.twig', array(
            'composition' => $composition,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing composition entity.
     *
     * @Route("/{id}/edit", name="composition_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Composition $composition)
    {
        $deleteForm = $this->createDeleteForm($composition);
        $editForm = $this->createForm('AppBundle\Form\CompositionType', $composition);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('composition_edit', array('id' => $composition->getId()));
        }

        return $this->render('composition/edit.html.twig', array(
            'composition' => $composition,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a composition entity.
     *
     * @Route("/{id}", name="composition_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Composition $composition)
    {
        $form = $this->createDeleteForm($composition);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($composition);
            $em->flush();
        }

        return $this->redirectToRoute('composition_index');
    }

    /**
     * Creates a form to delete a composition entity.
     *
     * @param Composition $composition The composition entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Composition $composition)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('composition_delete', array('id' => $composition->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
