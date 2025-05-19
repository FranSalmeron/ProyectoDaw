<?php

namespace App\Repository;

use App\Entity\Car;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Car>
 *
 * @method Car|null find($id, $lockMode = null, $lockVersion = null)
 * @method Car|null findOneBy(array $criteria, array $orderBy = null)
 * @method Car[]    findAll()
 * @method Car[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Car::class);
    }

    public function findTopSellingCars(int $limit = 5): array
    {
        return $this->createQueryBuilder('c')
            ->select('c.id, c.brand, c.model, COUNT(t.id) AS count')
            ->join('App\Entity\Transaction', 't', 'WITH', 't.car = c.id')
            ->groupBy('c.id')
            ->orderBy('count', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getArrayResult();
    }

    public function findMostFavoriteCars(): array
    {
        return $this->createQueryBuilder('c')
            ->select('c.id, c.brand, c.model, COALESCE(COUNT(cf.id), 0) AS favorites_count')
            ->leftJoin('App\Entity\CarFavorite', 'cf', 'WITH', 'cf.car = c.id')
            ->groupBy('c.id')
            ->orderBy('favorites_count', 'DESC')
            ->getQuery()
            ->getArrayResult();
    }



    //    /**
    //     * @return Car[] Returns an array of Car objects
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

    //    public function findOneBySomeField($value): ?Car
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
