<?php

namespace App\Entity\Seo;

use Doctrine\ORM\Mapping as ORM;
use Faros\Component\Seo\Model\RuleException as RuleExceptionModel;

#[ORM\Entity]
#[ORM\Table(name: 'faros_seo_rule_exception')]
class RuleException extends RuleExceptionModel
{
    /**
     * @var int|null
     */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    protected $id;

    /**
     * @var Rule|null
     */
    #[ORM\ManyToOne(targetEntity: Rule::class, inversedBy: 'exceptions')]
    protected $rule;
}
