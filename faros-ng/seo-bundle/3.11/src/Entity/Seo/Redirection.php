<?php

namespace App\Entity\Seo;

use Doctrine\ORM\Mapping as ORM;
use Faros\Bundle\SeoBundle\Repository\RedirectionRepository;
use Faros\Component\Seo\Model\Redirection as RedirectionModel;

#[ORM\Entity(repositoryClass: RedirectionRepository::class)]
#[ORM\Table(name: 'seo_redirection')]
class Redirection extends RedirectionModel
{
    /**
     * @var int|null
     */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    protected $id;
}
