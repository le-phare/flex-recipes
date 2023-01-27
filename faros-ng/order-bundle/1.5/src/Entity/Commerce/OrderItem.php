<?php

namespace App\Entity\Commerce;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Faros\Component\Order\Model\OrderItem as FarosOrderItem;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity
 * @ORM\Table(name="commerce_order_item")
 */
class OrderItem extends FarosOrderItem
{
    use BlameableEntity;
    use TimestampableEntity;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     * @Serializer\Groups({"cart_api"})
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Order", inversedBy="items")
     * @ORM\JoinColumn(name="order_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     *
     * @var Order
     */
    protected $order;

    /**
     * @ORM\OneToMany(targetEntity="Adjustment", mappedBy="orderItem", orphanRemoval=true, cascade={"persist"})
     *
     * @var Collection|Adjustment[]
     */
    protected $adjustments;

    /**
     * @ORM\OneToMany(targetEntity="OrderItemUnit", mappedBy="orderItem", orphanRemoval=true, cascade={"persist"})
     *
     * @var Collection|OrderItemUnit[]
     */
    protected $units;
}
