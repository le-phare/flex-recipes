<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Faros\Component\Security\Model\LoginAttempt as LoginAttemptModel;

/**
 * @ORM\Entity(repositoryClass="Faros\Bundle\SecurityBundle\ORM\LoginAttemptRepository")
 * @ORM\Table(name="faros_login_attempt")
 */
class UserLoginAttempt extends LoginAttemptModel
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    protected $id;
}
