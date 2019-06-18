<?php

namespace App\Repository;

use App\Entity\Textmotifs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Textmotifs|null find($id, $lockMode = null, $lockVersion = null)
 * @method Textmotifs|null findOneBy(array $criteria, array $orderBy = null)
 * @method Textmotifs[]    findAll()
 * @method Textmotifs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TextmotifsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Textmotifs::class);
    }

    // /**
    //  * @return Textmotifs[] Returns an array of Textmotifs objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Textmotifs
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
