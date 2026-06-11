<?php

namespace App\Entity\Seo;

use Doctrine\ORM\Mapping as ORM;
use Faros\Component\Seo\Model\RuleException as RuleExceptionModel;
use Faros\Component\Seo\Model\RuleInterface;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * @extends RuleExceptionModel<Rule>
 */
#[ORM\Entity]
#[ORM\Table(name: 'faros_seo_rule_exception')]
class RuleException extends RuleExceptionModel
{
    use BlameableEntity;
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    protected ?int $id = null;

    /**
     * @var Rule|null
     */
    #[ORM\ManyToOne(targetEntity: Rule::class, inversedBy: 'exceptions')]
    protected ?RuleInterface $rule = null;
}
