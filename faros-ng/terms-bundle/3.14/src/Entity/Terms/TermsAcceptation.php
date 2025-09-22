<?php

namespace App\Entity\Terms;

use App\Entity\User;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Faros\Bundle\TermsBundle\Repository\TermsAcceptationRepository;
use Faros\Component\Terms\Model\TermsAcceptation as TermsAcceptationModel;
use Faros\Component\Terms\Model\TermsInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: TermsAcceptationRepository::class)]
#[ORM\Table(name: 'faros_terms_acceptation')]
class TermsAcceptation extends TermsAcceptationModel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::INTEGER)]
    protected $id;

    /**
     * @var User
     */
    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: false)]
    protected UserInterface $user;

    /**
     * @var Terms
     */
    #[ORM\ManyToOne(targetEntity: Terms::class)]
    #[ORM\JoinColumn(nullable: false)]
    protected TermsInterface $terms;
}
