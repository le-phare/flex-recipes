<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
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
     * @var int|null
     */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    protected $id;

    /**
     * @var Collection<int, Group>
     */
    #[ORM\ManyToMany(targetEntity: Group::class, mappedBy: 'users')]
    protected $groups;
}
