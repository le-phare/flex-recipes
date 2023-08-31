<?php

namespace App\Entity\Commerce;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Faros\Bundle\CommerceBundle\Model\Order as FarosOrder;
use Faros\Bundle\CommerceBundle\Repository\OrderRepository;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\Serializer\Annotation as Serializer;

#[ORM\Entity(repositoryClass: OrderRepository::class)]
#[ORM\Table(name: 'commerce_order')]
class Order extends FarosOrder
{
    use BlameableEntity;
    use TimestampableEntity;

    /**
     * @var int|null
     */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Serializer\Groups(['cart_api'])]
    protected $id;

    /**
     * @var Collection<int, OrderItem>
     */
    #[ORM\OneToMany(targetEntity: OrderItem::class, mappedBy: 'order', orphanRemoval: true, cascade: ['persist'])]
    #[Serializer\Groups(['cart_api'])]
    #[ORM\OrderBy(['createdAt' => 'asc'])]
    protected $items;

    /**
     * @var Collection<int, Adjustment>
     */
    #[ORM\OneToMany(targetEntity: Adjustment::class, mappedBy: 'order', orphanRemoval: true, cascade: ['persist'])]
    #[Serializer\Groups(['cart_api'])]
    protected $adjustments;
}
