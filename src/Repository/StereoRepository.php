<?php

namespace App\Repository;

use App\Entity\Stereo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Stereo|null find($id, $lockMode = null, $lockVersion = null)
 * @method Stereo|null findOneBy(array $criteria, array $orderBy = null)
 * @method Stereo[]    findAll()
 * @method Stereo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StereoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Stereo::class);
    }

    // /**
    //  * @return Stereo[] Returns an array of Stereo objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Stereo
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
