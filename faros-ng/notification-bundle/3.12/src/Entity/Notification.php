<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Faros\Bundle\NotificationBundle\Repository\NotificationRepository;
use Faros\Component\Notification\Model\Notification as NotificationModel;
use Faros\Component\User\Model\UserInterface;

#[ORM\Entity(repositoryClass: NotificationRepository::class)]
#[ORM\Table(name: 'faros_notification')]
class Notification extends NotificationModel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    protected ?int $id = null;

    /**
     * @var User
     */
    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: false)]
    protected UserInterface $user;
}
