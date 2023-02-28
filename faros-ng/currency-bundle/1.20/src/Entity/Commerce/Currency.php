<?php

namespace App\Entity\Commerce;

use Doctrine\ORM\Mapping as ORM;
use Faros\Component\Currency\Model\Currency as FarosCurrency;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity
 * @ORM\Table(name="commerce_currency")
 */
#[ORM\Entity]
#[ORM\Table(name: 'commerce_currency')]
class Currency extends FarosCurrency
{
    use BlameableEntity;
    use TimestampableEntity;

    /**
     * @ORM\Id
     * @ORM\Column(type="string")
     * @Serializer\Groups({"cart_api"})
     *
     * @var string
     */
    #[ORM\Id]
    #[ORM\Column(type: 'string')]
    #[Serializer\Groups(['cart_api'])]
    protected $code;
}
