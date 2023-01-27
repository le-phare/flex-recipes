<?php

namespace App\Entity\EventLog;

use Doctrine\Common\Collections\Collection;
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
     * @var Collection<Tag>
     * @ORM\ManyToMany(targetEntity="Tag:class")
     * @ORM\JoinTable(name="_transaction_tag")
     */
    protected $tags;

    /**
     * @var Collection<User>
     * @ORM\ManyToMany(targetEntity="User:class")
     * @ORM\JoinTable(name="_transaction_user")
     */
    protected $viewedBy;

    /**
     * @var User|null
     * @ORM\ManyToOne(targetEntity="User:class")
     */
    protected $assignee;

    /**
     * @var User|null
     * @ORM\ManyToOne(targetEntity="User:class")
     */
    protected $resolvedBy;
}
