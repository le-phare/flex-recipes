<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Faros\Component\Export\Model\Export as ExportModel;
use Faros\Bundle\ExportBundle\ORM\ExportRepository;

#[ORM\Entity(repositoryClass: ExportRepository::class)]
#[ORM\Table(name: 'faros_export')]
class Export extends ExportModel
{
    /**
     * @var int|null
     */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    protected $id;

    /**
     * @var Collection<int, Group>
     */
    #[ORM\ManyToMany(targetEntity: Group::class)]
    protected $groups;
}
