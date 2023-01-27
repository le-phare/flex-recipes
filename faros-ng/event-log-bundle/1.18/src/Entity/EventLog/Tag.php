<?php

namespace App\Entity\EventLog;

use Doctrine\ORM\Mapping as ORM;
use Faros\Component\EventLog\Model\Tag as TagModel;
use Faros\Component\EventLog\Model\TagInterface;
use Faros\Component\EventLog\Traits\TimestampableImmutableEntity;
use Gedmo\Blameable\Traits\BlameableEntity;

/**
 * @ORM\Entity(repositoryClass="Faros\Bundle\EventLogBundle\Repository\TagRepository")
 * @ORM\Table(name="_tag")
 */
class Tag extends TagModel implements TagInterface
{
    use BlameableEntity;
    use TimestampableImmutableEntity;
}
