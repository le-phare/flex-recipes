<?php

namespace App\Entity\Comment;

use App\Entity\User;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Faros\Bundle\CommentBundle\Entity\CommentInterface;
use Faros\Bundle\CommentBundle\Repository\CommentRepository;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: CommentRepository::class)]
#[ORM\Table(name: 'faros_comment_comment')]
#[ORM\Index(columns: ['object_class'])]
#[ORM\Index(columns: ['object_id'])]
#[ORM\Index(columns: ['created_at'])]
#[Gedmo\Tree(type: 'closure')]
#[Gedmo\TreeClosure(class: CommentClosure::class)]
class Comment extends \Faros\Bundle\CommentBundle\Entity\Comment
{
    use BlameableEntity;
    use TimestampableEntity;

    #[ORM\ManyToOne(targetEntity: self::class)]
    #[ORM\JoinColumn(nullable: true, onDelete: 'CASCADE')]
    #[Gedmo\TreeParent]
    protected ?CommentInterface $parent = null;

    /**
     * @var Collection<int, CommentClosure>
     */
    #[ORM\OneToMany(targetEntity: CommentClosure::class, mappedBy: 'descendant')]
    protected Collection $ancestors;

    /**
     * @var Collection<int, CommentClosure>
     */
    #[ORM\OneToMany(targetEntity: CommentClosure::class, mappedBy: 'ancestor')]
    protected Collection $descendants;

    #[Gedmo\TreeLevel]
    protected int $depth = 0;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: true, onDelete: 'SET NULL')]
    protected ?UserInterface $user = null;

    public function __construct()
    {
        parent::__construct();
    }
}
