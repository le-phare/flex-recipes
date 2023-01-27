<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Faros\Component\User\Model\Group as GroupModel;

/**
 * @ORM\Entity
 * @ORM\Table(name="faros_group")
 */
#[ORM\Entity]
#[ORM\Table(name: 'faros_group')]
class Group extends GroupModel
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    protected $id;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, inversedBy="groups")
     * @ORM\JoinTable(name="faros_group_member")
     */
    #[ORM\ManyToMany(targetEntity: User::class, inversedBy: 'groups')]
    #[ORM\JoinTable(name: 'faros_group_member')]
    protected $users;
}
