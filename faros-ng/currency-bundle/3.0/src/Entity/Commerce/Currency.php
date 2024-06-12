<?php

namespace App\Entity\Commerce;

use Doctrine\ORM\Mapping as ORM;
use Faros\Bundle\CurrencyBundle\Repository\CurrencyRepository;
use Faros\Component\Currency\Model\Currency as FarosCurrency;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\Serializer\Annotation as Serializer;

#[ORM\Entity(repositoryClass: CurrencyRepository::class)]
#[ORM\Table(name: 'commerce_currency')]
class Currency extends FarosCurrency
{
    use BlameableEntity;
    use TimestampableEntity;

    /**
     * @var string
     */
    #[ORM\Id]
    #[ORM\Column(type: 'string')]
    #[Serializer\Groups(['cart_api'])]
    protected $code;
}
