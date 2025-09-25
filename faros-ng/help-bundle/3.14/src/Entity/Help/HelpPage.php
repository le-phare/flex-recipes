<?php

namespace App\Entity\Terms;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Faros\Bundle\HelpBundle\Repository\HelpPageRepository;
use Faros\Component\Help\Model\HelpPage as BaseHelpPage;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity(repositoryClass: HelpPageRepository::class)]
#[ORM\Table(name: 'faros_help_page')]
class HelpPage extends BaseHelpPage
{
    use BlameableEntity;
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::INTEGER)]
    protected $id;
}
