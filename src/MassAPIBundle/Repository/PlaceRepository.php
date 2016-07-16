<?php

namespace MassAPIBundle\Repository;

use Doctrine\ORM\EntityRepository;

class PlaceRepository extends EntityRepository
{
    public function getNearPlace(array $criteria = array())
    {
        return $this->createQueryBuilder('p')
            ->addSelect('p', 'g')
            ->leftJoin('p.geo', 'g')
            ->andWhere('CONTAINS(GeomFromJson(:inside_json), g.geoPoint) > 0')
            ->setParameter('inside_json', $criteria['inside_json'])
            ->getQuery()
            ->getResult()
            ;
    }
}
