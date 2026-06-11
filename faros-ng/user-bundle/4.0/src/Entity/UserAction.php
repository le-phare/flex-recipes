<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Faros\Bundle\UserBundle\Repository\ActionRepository;
use Faros\Component\User\Model\Action as ActionModel;
use Faros\Component\User\Model\UserInterface;

#[ORM\Entity(repositoryClass: ActionRepository::class)]
#[ORM\Table(name: 'faros_user_action')]
class UserAction extends ActionModel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    protected $id;

    /**
     * @var User|null
     */
    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: true, onDelete: 'SET NULL')]
    protected ?UserInterface $user = null;

    /**
     * @var User|null
     */
    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: true, onDelete: 'SET NULL')]
    protected ?UserInterface $impersonatedUser = null;
}
