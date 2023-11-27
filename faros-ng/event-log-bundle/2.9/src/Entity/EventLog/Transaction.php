<?php

namespace App\Entity\EventLog;

use App\Entity\User;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Faros\Component\EventLog\Model\Transaction as TransactionModel;
use Faros\Component\EventLog\Model\TransactionInterface;
use Faros\Component\EventLog\Traits\TimestampableImmutableEntity;
use Faros\Bundle\EventLogBundle\Repository\TransactionRepository;
use Gedmo\Blameable\Traits\BlameableEntity;

/**
 * @ORM\Entity(repositoryClass=TransactionRepository::class)
 * @ORM\Table(name="event_log_transaction")
 */
#[ORM\Entity(repositoryClass: TransactionRepository::class)]
#[ORM\Table(name: 'event_log_transaction')]
class Transaction extends TransactionModel implements TransactionInterface
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

    /**
     * @var Collection<int, Tag>
     * @ORM\ManyToMany(targetEntity="Tag:class")
     * @ORM\JoinTable(name="event_log_transaction_tag")
     */
    #[ORM\ManyToMany(targetEntity: Tag::class)]
    #[ORM\JoinTable(name: 'event_log_transaction_tag')]
    protected $tags;

    /**
     * @var Collection<int, User>
     * @ORM\ManyToMany(targetEntity="User:class")
     * @ORM\JoinTable(name="event_log_transaction_user")
     */
    #[ORM\ManyToMany(targetEntity: User::class)]
    #[ORM\JoinTable(name: 'event_log_transaction_user')]
    protected $viewedBy;

    /**
     * @var User|null
     * @ORM\ManyToOne(targetEntity="User:class")
     */
    #[ORM\ManyToOne(targetEntity: User::class)]
    protected $assignee;

    /**
     * @var User|null
     * @ORM\ManyToOne(targetEntity="User:class")
     */
    #[ORM\ManyToOne(targetEntity: User::class)]
    protected $resolvedBy;
}
