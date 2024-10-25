<?php

namespace App\Entity\Seo;

use Doctrine\ORM\Mapping as ORM;
use Faros\Bundle\SeoBundle\Repository\RedirectionHistoryRepository;
use Faros\Component\Seo\Model\RedirectionHistory as RedirectionHistoryModel;

#[ORM\Entity(repositoryClass: RedirectionHistoryRepository::class)]
#[ORM\Table(name: 'seo_redirection_history')]
class RedirectionHistory extends RedirectionHistoryModel
{
    /**
     * @var int|null
     */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    protected $id;
}
