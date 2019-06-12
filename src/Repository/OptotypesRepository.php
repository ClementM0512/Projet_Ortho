<?php

namespace App\Repository;

use App\Entity\Optotypes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Optotypes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Optotypes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Optotypes[]    findAll()
 * @method Optotypes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OptotypesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Optotypes::class);
    }

    // /**
    //  * @return Optotypes[] Returns an array of Optotypes objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Optotypes
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
