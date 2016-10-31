<?php

namespace MassAPIBundle\Repository;

use Doctrine\ORM\EntityRepository;
use MassAPIBundle\Entity\PostalCode;

class PlaceRepository extends EntityRepository
{
    public function getNearPlace(array $criteria = array())
    {
        return $this->createQueryBuilder('p')
            ->addSelect('p', 'g', 'e')
            ->leftJoin('p.geo', 'g')
            ->leftJoin('p.event', 'e')
            ->andWhere('CONTAINS(GeomFromJson(:inside_json), g.geoPoint) > 0')
            ->setParameter('inside_json', $criteria['inside_json'])
            ->orderBy('e.doorTime', 'ASC')
            ->setMaxResults(50)
            ->getQuery()
            ->getResult()
            ;
    }

    public function getByPostalCode(PostalCode $postalCode)
    {
        return $this->createQueryBuilder('p')
            ->addSelect('p', 'a')
            ->leftJoin('p.address', 'a')
            ->leftJoin('p.event', 'e')
            ->andWhere('a.postalCode = :postalCode')
            //->andWhere('e.doorTime > :now')
            ->setParameters(array(
                'postalCode' => $postalCode->getPostalCode(),
                //'now' => new \DateTime(),
            ))
            ->getQuery()
            ->getResult()
            ;
    }
}
