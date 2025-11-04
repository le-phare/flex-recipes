<?php

namespace App\Entity\Task;

use Doctrine\ORM\Mapping as ORM;
use Faros\Bundle\TaskBundle\Repository\TaskHistoryRepository;
use Faros\Component\Task\Model\TaskHistory as TaskHistoryModel;
use Faros\Component\Task\Model\TaskHistoryInterface;
use Gedmo\Blameable\Traits\BlameableEntity;

#[ORM\Entity(repositoryClass: TaskHistoryRepository::class)]
#[ORM\Table(name: 'faros_task_task_history')]
class TaskHistory extends TaskHistoryModel implements TaskHistoryInterface
{
    use BlameableEntity;

    /**
     * @var int|null
     */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    protected $id;
}
