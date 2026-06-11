<?php

namespace App\Entity\Commerce;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Faros\Bundle\CommerceBundle\Model\Order as FarosOrder;
use Faros\Bundle\CommerceBundle\Model\ShopUserInterface;
use Faros\Bundle\CommerceBundle\Repository\OrderRepository;
use Faros\Component\Customer\Model\CustomerInterface;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\Serializer\Attribute as Serializer;

/**
 * @extends FarosOrder<Adjustment, OrderItem, ShopUserInterface>
 */
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
     * @var Collection<array-key, OrderItem>
     */
    #[ORM\OneToMany(targetEntity: OrderItem::class, mappedBy: 'order', orphanRemoval: true, cascade: ['persist'])]
    #[Serializer\Groups(['cart_api'])]
    #[ORM\OrderBy(['createdAt' => 'asc'])]
    protected Collection $items;

    /**
     * @var Collection<array-key, Adjustment>
     */
    #[ORM\OneToMany(targetEntity: Adjustment::class, mappedBy: 'order', orphanRemoval: true, cascade: ['persist'])]
    #[Serializer\Groups(['cart_api'])]
    protected Collection $adjustments;

    // /** @var CustomerProfile|null */
    // #[ORM\ManyToOne(targetEntity: CustomerProfile::class, inversedBy: 'orders')]
    // protected ?CustomerInterface $customer = null;
}
