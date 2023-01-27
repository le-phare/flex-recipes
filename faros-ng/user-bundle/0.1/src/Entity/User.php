<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Faros\Component\User\Model\User as UserModel;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="Faros\Bundle\UserBundle\Repository\UserRepository")
 * @ORM\Table(name="faros_user")
 */
class User extends UserModel implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Group", mappedBy="users")
     */
    protected $groups;
}
