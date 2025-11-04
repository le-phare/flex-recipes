<?php

namespace App\Entity\Task;

use Doctrine\ORM\Mapping as ORM;
use Faros\Bundle\TaskBundle\Repository\TaskRepository;
use Faros\Component\Task\Model\Task as TaskModel;
use Faros\Component\Task\Model\TaskInterface;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity(repositoryClass: TaskRepository::class)]
#[ORM\Table(name: 'faros_task_task')]
class Task extends TaskModel implements TaskInterface
{
    use BlameableEntity;
    use TimestampableEntity;

    /**
     * @var int|null
     */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    protected $id;
}
