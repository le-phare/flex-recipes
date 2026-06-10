<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Faros\Bundle\ExportBundle\ORM\ExportTagRepository;
use Faros\Component\Export\Model\ExportTag as ExportTagModel;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity(repositoryClass: ExportTagRepository::class)]
#[ORM\Table(name: 'faros_export_tag')]
class ExportTag extends ExportTagModel
{
    use BlameableEntity;
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    protected $id;
}
