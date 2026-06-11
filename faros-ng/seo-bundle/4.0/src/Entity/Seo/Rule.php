<?php

namespace App\Entity\Seo;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Faros\Bundle\SeoBundle\Repository\RuleRepository;
use Faros\Component\Seo\Model\Rule as RuleModel;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * @extends RuleModel<RuleException>
 */
#[ORM\Entity(repositoryClass: RuleRepository::class)]
#[ORM\Table(name: 'faros_seo_rule')]
class Rule extends RuleModel
{
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    protected ?int $id;

    /**
     * @var Collection<int, RuleException>
     */
    #[ORM\OneToMany(targetEntity: RuleException::class, mappedBy: 'rule')]
    protected Collection $exceptions;
}
