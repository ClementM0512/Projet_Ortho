<?php

namespace App\Repository;

use App\Entity\Contrastes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Contrastes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Contrastes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Contrastes[]    findAll()
 * @method Contrastes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContrastesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Contrastes::class);
    }

    // /**
    //  * @return Contrastes[] Returns an array of Contrastes objects
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
    public function findOneBySomeField($value): ?Contrastes
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
