<?php

namespace App\Repository;

use App\Entity\Echelle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Echelle|null find($id, $lockMode = null, $lockVersion = null)
 * @method Echelle|null findOneBy(array $criteria, array $orderBy = null)
 * @method Echelle[]    findAll()
 * @method Echelle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EchelleRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Echelle::class);
    }

    // /**
    //  * @return Echelle[] Returns an array of Echelle objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Echelle
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
