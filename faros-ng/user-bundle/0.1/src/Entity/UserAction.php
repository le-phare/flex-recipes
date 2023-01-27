<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Faros\Component\User\Model\Action as ActionModel;

/**
 * @ORM\Entity
 * @ORM\Table(name="faros_user_action")
 */
class UserAction extends ActionModel
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     */
    protected $user;
}
