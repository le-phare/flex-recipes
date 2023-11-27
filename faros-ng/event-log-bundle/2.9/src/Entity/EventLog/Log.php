<?php

namespace App\Entity\EventLog;

use Doctrine\ORM\Mapping as ORM;
use Faros\Component\EventLog\Model\Log as LogModel;
use Faros\Component\EventLog\Model\LogInterface;
use Faros\Component\EventLog\Traits\TimestampableImmutableEntity;
use Faros\Bundle\EventLogBundle\Repository\LogRepository;
use Gedmo\Blameable\Traits\BlameableEntity;

/**
 * @ORM\Entity(repositoryClass=LogRepository::class)
 * @ORM\Table(name="event_log_log")
 */
#[ORM\Entity(repositoryClass: LogRepository::class)]
#[ORM\Table(name: 'event_log_log')]
class Log extends LogModel implements LogInterface
{
    use BlameableEntity;
    use TimestampableImmutableEntity;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    protected $id;
}
