<?php

namespace App\Entity\Commerce;

use Doctrine\ORM\Mapping as ORM;
use Faros\Component\Order\Model\Adjustment as FarosAdjustment;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity
 * @ORM\Table(name="commerce_adjustment")
 */
#[ORM\Entity]
#[ORM\Table(name: 'commerce_adjustment')]
class Adjustment extends FarosAdjustment
{
    use BlameableEntity;
    use TimestampableEntity;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     * @Serializer\Groups({"cart_api"})
     */
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    #[ORM\Column(type: 'integer')]
    #[Serializer\Groups(['cart_api'])]
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Order", inversedBy="adjustments")
     * @ORM\JoinColumn(name="order_id", referencedColumnName="id", nullable=true, onDelete="CASCADE")
     *
     * @var Order|null
     */
    #[ORM\ManyToOne(targetEntity: Order::class, inversedBy: 'adjustments')]
    #[ORM\JoinColumn(name: 'order_id', referencedColumnName: 'id', nullable: true, onDelete: 'CASCADE')]
    protected $order;

    /**
     * @ORM\ManyToOne(targetEntity="OrderItem", inversedBy="adjustments")
     * @ORM\JoinColumn(name="order_item_id", referencedColumnName="id", nullable=true, onDelete="CASCADE")
     *
     * @var OrderItem|null
     */
    #[ORM\ManyToOne(targetEntity: OrderItem::class, inversedBy: 'adjustments')]
    #[ORM\JoinColumn(name: 'order_item_id', referencedColumnName: 'id', nullable: true, onDelete: 'CASCADE')]
    protected $orderItem;

    /**
     * @ORM\ManyToOne(targetEntity="OrderItemUnit", inversedBy="adjustments")
     * @ORM\JoinColumn(name="order_item_unit_id", referencedColumnName="id", nullable=true, onDelete="CASCADE")
     *
     * @var OrderItemUnit|null
     */
    #[ORM\ManyToOne(targetEntity: OrderItemUnit::class, inversedBy: 'adjustments')]
    #[ORM\JoinColumn(name: 'order_item_unit_id', referencedColumnName: 'id', nullable: true, onDelete: 'CASCADE')]
    protected $orderItemUnit;
}
