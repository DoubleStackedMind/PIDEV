<?php

namespace GestionShopBundle\Repository;

/**
 * ProduitsRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProduitsRepository extends \Doctrine\ORM\EntityRepository
{

    public function findArray($array)
    {
        $qb = $this->createQueryBuilder('u')
            ->Select('u')->where('u.idProduit IN (:array)')
            ->setParameter('array',$array);
        return $qb->getQuery()->getResult();
    }

    public  function UpdateStock($id)
    {
        $qb = $this->createQueryBuilder('u')
            ->update('u')->where('u.idProduit = id')
            ->setParameter('id',$id);
    }
}