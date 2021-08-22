<?php

namespace App\Repository;

use App\Entity\HideoutsType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method HideoutsType|null find($id, $lockMode = null, $lockVersion = null)
 * @method HideoutsType|null findOneBy(array $criteria, array $orderBy = null)
 * @method HideoutsType[]    findAll()
 * @method HideoutsType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HideoutsTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HideoutsType::class);
    }

    // /**
    //  * @return HideoutsType[] Returns an array of HideoutsType objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?HideoutsType
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
