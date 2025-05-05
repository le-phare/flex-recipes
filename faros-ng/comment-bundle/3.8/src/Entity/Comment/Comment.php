<?php

namespace App\Entity\Comment;

use App\Entity\User;
use Doctrine\ORM\Mapping as ORM;
use Faros\Bundle\CommentBundle\Repository\CommentRepository;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Timestampable\Traits\TimestampableEntity;

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
    protected $parent;

    #[ORM\OneToMany(targetEntity: CommentClosure::class, mappedBy: 'descendant')]
    protected $ancestors;

    #[ORM\OneToMany(targetEntity: CommentClosure::class, mappedBy: 'ancestor')]
    protected $descendants;

    /** @var int */
    #[Gedmo\TreeLevel]
    protected $depth = 0;

    /** @var User|null */
    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: true, onDelete: 'SET NULL')]
    protected $user;

    public function __construct()
    {
        parent::__construct();
    }
}
