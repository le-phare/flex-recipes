<?php

namespace App\Entity\Commerce;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Faros\Component\Order\Model\OrderItemUnit as FarosOrderItemUnit;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="commerce_order_item_unit")
 */
#[ORM\Entity]
#[ORM\Table(name: 'commerce_order_item_unit')]
class OrderItemUnit extends FarosOrderItemUnit
{
    use BlameableEntity;
    use TimestampableEntity;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    #[ORM\Column(type: 'integer')]
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity=OrderItem::class, inversedBy="units")
     * @ORM\JoinColumn(name="order_item_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     *
     * @var OrderItem
     */
    #[ORM\ManyToOne(targetEntity: OrderItem::class, inversedBy: 'units')]
    #[ORM\JoinColumn(name: 'order_item_id', referencedColumnName: 'id', nullable: false, onDelete: 'CASCADE')]
    protected $orderItem;

    /**
     * @ORM\OneToMany(targetEntity=Adjustment::class, mappedBy="orderItemUnit", orphanRemoval=true)
     *
     * @var Collection<int, Adjustment>
     */
    #[ORM\OneToMany(targetEntity: Adjustment::class, mappedBy: 'orderItemUnit', orphanRemoval: true)]
    protected $adjustments;
}
