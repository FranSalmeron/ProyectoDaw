<?php

namespace App\Repository;

use App\Entity\CarFavorite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CarFavorite>
 *
 * @method CarFavorite|null find($id, $lockMode = null, $lockVersion = null)
 * @method CarFavorite|null findOneBy(array $criteria, array $orderBy = null)
 * @method CarFavorite[]    findAll()
 * @method CarFavorite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarFavoriteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CarFavorite::class);
    }

//    /**
//     * @return CarFavorite[] Returns an array of CarFavorite objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CarFavorite
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
