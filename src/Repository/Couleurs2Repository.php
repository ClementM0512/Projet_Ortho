<?php

namespace App\Repository;

use App\Entity\Couleurs2;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Couleurs2|null find($id, $lockMode = null, $lockVersion = null)
 * @method Couleurs2|null findOneBy(array $criteria, array $orderBy = null)
 * @method Couleurs2[]    findAll()
 * @method Couleurs2[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class Couleurs2Repository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Couleurs2::class);
    }

    // /**
    //  * @return Couleurs2[] Returns an array of Couleurs2 objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Couleurs2
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
