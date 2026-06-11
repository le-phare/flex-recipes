<?php

namespace App\Entity\Commerce;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Faros\Component\Order\Model\OrderInterface;
use Faros\Component\Order\Model\OrderItem as FarosOrderItem;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\Serializer\Attribute as Serializer;

/**
 * @extends FarosOrderItem<Order, OrderItemUnit, Adjustment>
 */
#[ORM\Entity]
#[ORM\Table(name: 'commerce_order_item')]
class OrderItem extends FarosOrderItem
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
     * @var Order
     */
    #[ORM\ManyToOne(targetEntity: Order::class, inversedBy: 'items')]
    #[ORM\JoinColumn(name: 'order_id', referencedColumnName: 'id', nullable: true, onDelete: 'CASCADE')]
    protected ?OrderInterface $order = null;

    /**
     * @var Collection<array-key, Adjustment>
     */
    #[ORM\OneToMany(targetEntity: Adjustment::class, mappedBy: 'orderItem', orphanRemoval: true, cascade: ['persist'])]
    protected Collection $adjustments;

    /**
     * @var Collection<array-key, OrderItemUnit>
     */
    #[ORM\OneToMany(targetEntity: OrderItemUnit::class, mappedBy: 'orderItem', orphanRemoval: true, cascade: ['persist'])]
    protected Collection $units;
}
