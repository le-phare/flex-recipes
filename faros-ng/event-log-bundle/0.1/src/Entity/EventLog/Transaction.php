<?php

namespace App\Entity\EventLog;

use Doctrine\ORM\Mapping as ORM;
use Faros\Component\EventLog\Model\Transaction as TransactionModel;
use Faros\Component\EventLog\Model\TransactionInterface;
use Faros\Component\EventLog\Traits\TimestampableImmutableEntity;
use Gedmo\Blameable\Traits\BlameableEntity;

/**
 * @ORM\Entity(repositoryClass="Faros\Bundle\EventLogBundle\Repository\TransactionRepository")
 * @ORM\Table(name="_transaction")
 */
class Transaction extends TransactionModel implements TransactionInterface
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
     * @ORM\ManyToMany(targetEntity="Tag")
     * @ORM\JoinTable(name="_transaction_tag")
     */
    protected $tags;

    /**
     * @ORM\OneToMany(targetEntity="Log", mappedBy="transaction")
     */
    protected $logs;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User")
     * @ORM\JoinTable(name="_transaction_user")
     */
    protected $viewedBy;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     */
    protected $assignee;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     */
    protected $resolvedBy;
}
