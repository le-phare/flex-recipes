<?php

namespace App\Entity\Seo;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Faros\Component\Seo\Model\Rule as RuleModel;

/**
 * @ORM\Entity
 * @ORM\Table(name="seo_rule")
 */
#[ORM\Entity]
#[ORM\Table(name: 'seo_rule')]
class Rule extends RuleModel
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

    /**
     * @ORM\OneToMany(targetEntity=RuleException::class, mappedBy="rule")
     *
     * @var Collection<int, RuleException>
     */
    #[ORM\OneToMany(targetEntity: RuleException::class, mappedBy: 'rule')]
    protected $exceptions;
}
