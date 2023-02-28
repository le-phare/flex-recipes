<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Faros\Bundle\UserBundle\Repository\UserRepository;
use Faros\Component\User\Model\User as UserModel;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="faros_user")
 */
#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: 'faros_user')]
class User extends UserModel implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    #[ORM\Column(type: 'integer')]
    protected $id;

    /**
     * @ORM\ManyToMany(targetEntity=Group::class, mappedBy="users")
     */
    #[ORM\ManyToMany(targetEntity: Group::class, mappedBy: 'users')]
    protected $groups;
}
