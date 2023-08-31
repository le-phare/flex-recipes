<?php

namespace App\Entity\Seo;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Faros\Component\Seo\Model\Rule as RuleModel;

#[ORM\Entity]
#[ORM\Table(name: 'seo_rule')]
class Rule extends RuleModel
{
    /**
     * @var int|null
     */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    protected $id;

    /**
     * @var Collection<int, RuleException>
     */
    #[ORM\OneToMany(targetEntity: RuleException::class, mappedBy: 'rule')]
    protected $exceptions;
}
