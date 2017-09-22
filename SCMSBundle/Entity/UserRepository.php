<?php

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NoResultException;

/**
 * Description of UserRepository
 *
 * @author szoske
 */
class UserRepository extends EntityRepository implements UserProviderInterface{
    
    public function loadUserByUsername($username) 
    {
        $q = $this->createQueryBuilder('u')
                  ->where('u.username = :username')
                  ->setParameter('username', $username)
                  ->getQuery();
        
        try
        {
            $user = $q->getSingleResult();
        } 
        catch (\Doctrine\ORM\NoResultException $e)
        {
            $message = sprintf(
                'Unable to find an active admin AcmeUserBundle:User object identified by "%s".',
                $username
            );
            throw new UsernameNotFoundException($message, 0, $e);
        }
        
        return $user;
    }

    public function refreshUser(UserInterface $user) {
        $class = get_class($user);
        if(!$this->supportsClass($class))
        {
            throw new UnsupportedUserException(
                sprintf('instances of "%a" are not supported.', $class)
                    );
        }
        
        return $this->find($user->getId());
    }

    public function supportsClass($class) {
        return $this->getEntityName() === $class
                || is_subclass_of($class, $this->getEntityName());
    }    
}

?>
