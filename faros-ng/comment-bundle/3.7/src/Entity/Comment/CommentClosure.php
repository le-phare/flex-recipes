<?php

namespace App\Entity\Comment;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'faros_comment_comment_closure')]
class CommentClosure extends \Faros\Bundle\CommentBundle\Entity\CommentClosure
{
    /**
     * @var Comment
     */
    #[ORM\ManyToOne(targetEntity: Comment::class, inversedBy: 'descendants', fetch: 'LAZY')]
    #[ORM\JoinColumn(referencedColumnName: 'id', nullable: false, onDelete: 'CASCADE')]
    protected $ancestor;

    /**
     * @var Comment
     */
    #[ORM\ManyToOne(targetEntity: Comment::class, inversedBy: 'ancestors', fetch: 'LAZY')]
    #[ORM\JoinColumn(referencedColumnName: 'id', nullable: false, onDelete: 'CASCADE')]
    protected $descendant;
}
