<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class PerformedAtRepository extends EntityRepository
{
    /**
     * get compositions by concert
     * @param \AppBundle\Entity\Concert $concert
     * @return array
     */
    public function getCompositionsByConcert(\AppBundle\Entity\Concert $concert)
    {
        $mappings = $this->findBy(
            ['concert' => $concert],
            ['position' => 'ASC']
        );
        $compositions = array();
        foreach($mappings as $mapping) {
            $compositions[$mapping->getPosition()] = $mapping->getComposition();
        }
        return $compositions;
    }
}
