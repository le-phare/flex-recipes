<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Faros\Bundle\SecurityBundle\ORM\LoginAttemptRepository;
use Faros\Component\Security\Model\LoginAttempt as LoginAttemptModel;

#[ORM\Entity(repositoryClass: LoginAttemptRepository::class)]
#[ORM\Table(name: 'faros_login_attempt')]
class UserLoginAttempt extends LoginAttemptModel
{
    /**
     * @var int|null
     */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    protected $id;
}
