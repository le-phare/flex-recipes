<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Faros\Bundle\SecurityBundle\ORM\LoginAttemptRepository;
use Faros\Component\Security\Model\LoginAttempt as LoginAttemptModel;

/**
 * @ORM\Entity(repositoryClass=LoginAttemptRepository::class)
 * @ORM\Table(name="faros_login_attempt")
 */
#[ORM\Entity(repositoryClass: LoginAttemptRepository::class)]
#[ORM\Table(name: 'faros_login_attempt')]
class UserLoginAttempt extends LoginAttemptModel
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
}
