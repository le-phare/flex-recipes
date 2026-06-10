<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Faros\Bundle\UserBundle\Repository\ActionRepository;
use Faros\Component\User\Model\Action as ActionModel;

#[ORM\Entity(repositoryClass: ActionRepository::class)]
#[ORM\Table(name: 'faros_user_action')]
class UserAction extends ActionModel
{
    /**
     * @var int|null
     */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    protected $id;

    /**
     * @var User
     */
    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: false)]
    protected $user;

    /**
     * @var User|null
     */
    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: true)]
    protected $impersonatedUser;
}
