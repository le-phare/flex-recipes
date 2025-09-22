<?php

namespace App\Entity\Terms;

use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Faros\Bundle\TermsBundle\Repository\TermsRepository;
use Faros\Component\Terms\Model\Terms as TermsModel;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity(repositoryClass: TermsRepository::class)]
#[ORM\Table(name: 'faros_terms')]
class Terms extends TermsModel
{
    use BlameableEntity;
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::INTEGER)]
    protected $id;

    /**
     * @var Collection<array-key, TermsAcceptation>
     */
    #[ORM\OneToMany(targetEntity: TermsAcceptation::class, mappedBy: 'terms', orphanRemoval: true)]
    protected Collection $termsAcceptations;
}
