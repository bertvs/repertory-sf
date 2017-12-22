<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class PublishedInRepository extends EntityRepository
{
    /**
     * get compositions by score
     * @param \AppBundle\Entity\Score $score
     * @return array
     */
    public function getCompositionsByScore(\AppBundle\Entity\Score $score)
    {
        $mappings = $this->findBy(
            ['score' => $score],
            ['position' => 'ASC']
        );
        $compositions = array();
        foreach($mappings as $mapping) {
            $compositions[$mapping->getPosition()] = $mapping->getComposition();
        }
        return $compositions;
    }
}
