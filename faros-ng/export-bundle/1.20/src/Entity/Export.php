<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Faros\Component\Export\Model\Export as ExportModel;
use Faros\Bundle\ExportBundle\ORM\ExportRepository;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * @ORM\Entity(repositoryClass=ExportRepository::class)
 * @ORM\Table(name="faros_export")
 */
#[ORM\Entity(repositoryClass: ExportRepository::class)]
#[ORM\Table(name: 'faros_export')]
class Export extends ExportModel
{
    use BlameableEntity;
    use TimestampableEntity;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    #[ORM\Column(type: 'integer')]
    protected $id;

    /**
     * @var Collection<int, Group>
     * @ORM\ManyToMany(targetEntity=Group::class)
     */
    #[ORM\ManyToMany(targetEntity: Group::class)]
    protected $groups;
}
