<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Faros\Component\User\Model\Group as GroupModel;

/**
 * @extends GroupModel<User>
 */
#[ORM\Entity]
#[ORM\Table(name: 'faros_group')]
class Group extends GroupModel
{
    /**
     * @var int|null
     */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    protected $id;

    #[ORM\ManyToMany(targetEntity: User::class, inversedBy: 'groups')]
    #[ORM\JoinTable(name: 'faros_group_member')]
    protected $users;
}
