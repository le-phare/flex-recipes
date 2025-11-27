<?php

namespace App\Entity\Task;

use Doctrine\ORM\Mapping as ORM;
use Faros\Bundle\TaskBundle\Repository\TaskHistoryRepository;
use Faros\Component\EventLog\Traits\TimestampableImmutableEntity;
use Faros\Component\Task\Model\TaskHistory as TaskHistoryModel;
use Faros\Component\Task\Model\TaskHistoryInterface;
use Gedmo\Blameable\Traits\BlameableEntity;

#[ORM\Entity(repositoryClass: TaskHistoryRepository::class)]
#[ORM\Table(name: 'task_history')]
class TaskHistory extends TaskHistoryModel implements TaskHistoryInterface
{
    use BlameableEntity;
    use TimestampableImmutableEntity;

    /**
     * @var int|null
     */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    protected $id;
}
