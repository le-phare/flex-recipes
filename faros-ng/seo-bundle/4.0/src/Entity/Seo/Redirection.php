<?php

namespace App\Entity\Seo;

use Doctrine\ORM\Mapping as ORM;
use Faros\Bundle\SeoBundle\Repository\RedirectionRepository;
use Faros\Component\Seo\Model\Redirection as RedirectionModel;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity(repositoryClass: RedirectionRepository::class)]
#[ORM\Table(name: 'faros_seo_redirection')]
class Redirection extends RedirectionModel
{
    use BlameableEntity;
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    protected ?int $id;
}
