<?php

namespace App\Entity\EventLog;

use Doctrine\ORM\Mapping as ORM;
use Faros\Component\EventLog\Model\Tag as TagModel;
use Faros\Component\EventLog\Model\TagInterface;
use Faros\Component\EventLog\Traits\TimestampableImmutableEntity;
use Faros\Bundle\EventLogBundle\Repository\TagRepository;
use Gedmo\Blameable\Traits\BlameableEntity;

/**
 * @ORM\Entity(repositoryClass=TagRepository::class)
 * @ORM\Table(name="event_log_tag")
 */
#[ORM\Entity(repositoryClass: TagRepository::class)]
#[ORM\Table(name: 'event_log_tag')]
class Tag extends TagModel implements TagInterface
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
