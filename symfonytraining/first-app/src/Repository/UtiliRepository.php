<?php

namespace App\Repository;

use App\Entity\Utili;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Utili|null find($id, $lockMode = null, $lockVersion = null)
 * @method Utili|null findOneBy(array $criteria, array $orderBy = null)
 * @method Utili[]    findAll()
 * @method Utili[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UtiliRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Utili::class);
    }

//    /**
//     * @return Utili[] Returns an array of Utili objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Utili
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
