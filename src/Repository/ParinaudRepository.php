<?php

namespace App\Repository;

use App\Entity\Parinaud;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Parinaud|null find($id, $lockMode = null, $lockVersion = null)
 * @method Parinaud|null findOneBy(array $criteria, array $orderBy = null)
 * @method Parinaud[]    findAll()
 * @method Parinaud[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParinaudRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Parinaud::class);
    }

    // /**
    //  * @return Parinaud[] Returns an array of Parinaud objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Parinaud
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
