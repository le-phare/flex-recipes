<?php

namespace App\Entity\EventLog;

use Doctrine\ORM\Mapping as ORM;
use Faros\Bundle\EventLogBundle\Repository\TagRepository;
use Faros\Component\EventLog\Model\Tag as TagModel;
use Faros\Component\EventLog\Model\TagInterface;
use Faros\Component\EventLog\Traits\TimestampableImmutableEntity;
use Gedmo\Blameable\Traits\BlameableEntity;

#[ORM\Entity(repositoryClass: TagRepository::class)]
#[ORM\Table(name: 'event_log_tag')]
class Tag extends TagModel implements TagInterface
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
