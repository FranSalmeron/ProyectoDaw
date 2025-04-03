<?php
// CarFavoriteRepository.php

namespace App\Repository;

use App\Entity\CarFavorite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\QueryBuilder;

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

    // Método para obtener los favoritos de un usuario con la relación Car cargada
    public function findByUserIdWithCar(int $userId): array
    {
        return $this->createQueryBuilder('cf')
            ->leftJoin('cf.car', 'car') 
            ->addSelect('car')          
            ->where('cf.user = :userId')
            ->setParameter('userId', $userId)
            ->getQuery()
            ->getResult();
    }
}
