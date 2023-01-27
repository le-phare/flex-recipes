<?php

namespace App\Entity\EventLog;

use Doctrine\ORM\Mapping as ORM;
use Faros\Component\EventLog\Model\Log as LogModel;
use Faros\Component\EventLog\Model\LogInterface;
use Faros\Component\EventLog\Traits\TimestampableImmutableEntity;
use Gedmo\Blameable\Traits\BlameableEntity;

/**
 * @ORM\Entity(repositoryClass="Faros\Bundle\EventLogBundle\Repository\LogRepository")
 * @ORM\Table(name="_log")
 */
class Log extends LogModel implements LogInterface
{
    use BlameableEntity;
    use TimestampableImmutableEntity;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Transaction", inversedBy="logs")
     */
    protected $transaction;
}
