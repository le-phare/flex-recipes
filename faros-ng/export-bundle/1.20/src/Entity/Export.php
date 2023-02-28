<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Faros\Component\Export\Model\Export as ExportModel;
use Faros\Bundle\ExportBundle\ORM\ExportRepository;

/**
 * @ORM\Entity(repositoryClass="Faros\Bundle\ExportBundle\ORM\ExportRepository")
 * @ORM\Table(name="faros_export")
 */
#[ORM\Entity(repositoryClass: ExportRepository::class)]
#[ORM\Table(name: 'faros_export')]
class Export extends ExportModel
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    #[ORM\Column(type: 'integer')]
    protected $id;
}
