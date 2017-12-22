<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class RecordedOnRepository extends EntityRepository
{
    /**
     * get compositions by album
     * @param \AppBundle\Entity\Album $album
     * @return array
     */
    public function getCompositionsByAlbum(\AppBundle\Entity\Album $album)
    {
        $mappings = $this->findBy(
            ['album' => $album],
            ['position' => 'ASC']
        );
        $compositions = array();
        foreach($mappings as $mapping) {
            $compositions[$mapping->getPosition()] = $mapping->getComposition();
        }
        return $compositions;
    }
}
