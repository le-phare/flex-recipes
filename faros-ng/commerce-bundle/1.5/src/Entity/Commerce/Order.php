<?php

namespace App\Entity\Commerce;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Faros\Bundle\CommerceBundle\Model\Order as FarosOrder;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity(repositoryClass="Faros\Bundle\CommerceBundle\Repository\OrderRepository")
 * @ORM\Table(name="commerce_order")
 */
class Order extends FarosOrder
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
     * @ORM\OneToMany(targetEntity="OrderItem", mappedBy="order", orphanRemoval=true, cascade={"persist"})
     * @Serializer\Groups({"cart_api"})
     * @ORM\OrderBy({"createdAt": "asc"})
     *
     * @var Collection|OrderItem[]
     */
    protected $items;

    /**
     * @ORM\OneToMany(targetEntity="Adjustment", mappedBy="order", orphanRemoval=true, cascade={"persist"})
     * @Serializer\Groups({"cart_api"})
     *
     * @var Collection|Adjustment[]
     */
    protected $adjustments;
}
