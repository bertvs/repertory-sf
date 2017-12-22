<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $compositionRepository = $em->getRepository('AppBundle:Composition');
        $compositions = $compositionRepository->findAll();

        $composerRepository = $em->getRepository('AppBundle:Composer');
        $composers = $composerRepository->findAll();

        $collectionRepository = $em->getRepository('AppBundle:Collection');
        $collections = $collectionRepository->findAll();

        $scoreRepository = $em->getRepository('AppBundle:Score');
        $scores = $scoreRepository->findAll();

        $albumRepository = $em->getRepository('AppBundle:Album');
        $albums = $albumRepository->findAll();

        $concertRepository = $em->getRepository('AppBundle:Concert');
        $concerts = $concertRepository->findAll();

        return $this->render('default/index.html.twig', array(
            'compositions' => $compositions,
            'composers' => $composers,
            'collections' => $collections,
            'scores' => $scores,
            'albums' => $albums,
            'concerts' => $concerts
        ));
    }
}
