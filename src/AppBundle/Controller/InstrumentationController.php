<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Instrumentation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Instrumentation controller.
 *
 * @Route("instrumentation")
 */
class InstrumentationController extends Controller
{
    /**
     * Lists all instrumentation entities.
     *
     * @Route("/", name="instrumentation_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $instrumentations = $em->getRepository('AppBundle:Instrumentation')->findAll();

        return $this->render('instrumentation/index.html.twig', array(
            'instrumentations' => $instrumentations,
        ));
    }

    /**
     * Creates a new instrumentation entity.
     *
     * @Route("/new", name="instrumentation_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $instrumentation = new Instrumentation();
        $form = $this->createForm('AppBundle\Form\InstrumentationType', $instrumentation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($instrumentation);
            $em->flush();

            return $this->redirectToRoute('instrumentation_show', array('code' => $instrumentation->getCode()));
        }

        return $this->render('instrumentation/new.html.twig', array(
            'instrumentation' => $instrumentation,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a instrumentation entity.
     *
     * @Route("/{code}", name="instrumentation_show")
     * @Method("GET")
     */
    public function showAction(Instrumentation $instrumentation)
    {
        $deleteForm = $this->createDeleteForm($instrumentation);

        return $this->render('instrumentation/show.html.twig', array(
            'instrumentation' => $instrumentation,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing instrumentation entity.
     *
     * @Route("/{code}/edit", name="instrumentation_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Instrumentation $instrumentation)
    {
        $deleteForm = $this->createDeleteForm($instrumentation);
        $editForm = $this->createForm('AppBundle\Form\InstrumentationType', $instrumentation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('instrumentation_edit', array('code' => $instrumentation->getCode()));
        }

        return $this->render('instrumentation/edit.html.twig', array(
            'instrumentation' => $instrumentation,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a instrumentation entity.
     *
     * @Route("/{code}", name="instrumentation_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Instrumentation $instrumentation)
    {
        $form = $this->createDeleteForm($instrumentation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($instrumentation);
            $em->flush();
        }

        return $this->redirectToRoute('instrumentation_index');
    }

    /**
     * Creates a form to delete a instrumentation entity.
     *
     * @param Instrumentation $instrumentation The instrumentation entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Instrumentation $instrumentation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('instrumentation_delete', array('code' => $instrumentation->getCode())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
