<?php
/**
 * Created by PhpStorm.
 * User: Marko
 * Date: 18/07/2016
 * Time: 15:09
 */

namespace AppBundle\Entity;

use Symfony\Bridge\Doctrine\Security\User\UserLoaderInterface;
use Doctrine\ORM\EntityRepository;

class KorisnikRepository extends EntityRepository implements UserLoaderInterface
{
    public function loadUserByUsername($username)
    {
        var_dump("pera");
        return $this->createQueryBuilder('u')
            ->where('u.korisnickoIme = :username OR u.email = :email')
            ->setParameter('username', $username)
            ->setParameter('email', $username)
            ->getQuery()
            ->getOneOrNullResult();
    }

}