<?php

namespace App\Entity\Commerce;

use Doctrine\ORM\Mapping as ORM;
use Faros\Component\Order\Model\Adjustment as FarosAdjustment;
use Faros\Component\Order\Model\OrderInterface;
use Faros\Component\Order\Model\OrderItemInterface;
use Faros\Component\Order\Model\OrderItemUnitInterface;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\Serializer\Attribute as Serializer;

/**
 * @extends FarosAdjustment<Order, OrderItem, OrderItemUnit>
 */
#[ORM\Entity]
#[ORM\Table(name: 'commerce_adjustment')]
class Adjustment extends FarosAdjustment
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

    /** @var Order|null */
    #[ORM\ManyToOne(targetEntity: Order::class, inversedBy: 'adjustments')]
    #[ORM\JoinColumn(name: 'order_id', referencedColumnName: 'id', nullable: true, onDelete: 'CASCADE')]
    protected ?OrderInterface $order = null;

    /** @var OrderItem|null */
    #[ORM\ManyToOne(targetEntity: OrderItem::class, inversedBy: 'adjustments')]
    #[ORM\JoinColumn(name: 'order_item_id', referencedColumnName: 'id', nullable: true, onDelete: 'CASCADE')]
    protected ?OrderItemInterface $orderItem = null;

    /** @var OrderItemUnit|null */
    #[ORM\ManyToOne(targetEntity: OrderItemUnit::class, inversedBy: 'adjustments')]
    #[ORM\JoinColumn(name: 'order_item_unit_id', referencedColumnName: 'id', nullable: true, onDelete: 'CASCADE')]
    protected ?OrderItemUnitInterface $orderItemUnit = null;
}
