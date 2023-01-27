<?php

namespace App\Entity\Seo;

use Doctrine\ORM\Mapping as ORM;
use Faros\Component\Seo\Model\Redirection as RedirectionModel;

/**
 * @ORM\Entity
 * @ORM\Table(name="seo_redirection")
 */
class Redirection extends RedirectionModel
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    protected $id;
}
