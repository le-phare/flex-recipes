<?php

namespace App\Entity\Seo;

use Doctrine\ORM\Mapping as ORM;
use Faros\Component\Seo\Model\RuleException as RuleExceptionModel;

/**
 * @ORM\Entity
 * @ORM\Table(name="seo_rule_exception")
 */
#[ORM\Entity]
#[ORM\Table(name: 'seo_rule_exception')]
class RuleException extends RuleExceptionModel
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Seo\Rule", inversedBy="exceptions")
     *
     * @var Rule|null
     */
    #[ORM\ManyToOne(targetEntity: Rule::class, inversedBy: 'exceptions')]
    protected $rule;
}
