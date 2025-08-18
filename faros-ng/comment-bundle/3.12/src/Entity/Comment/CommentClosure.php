<?php

namespace App\Entity\Comment;

use Doctrine\ORM\Mapping as ORM;
use Faros\Component\Comment\Model\CommentClosure as CommentClosureModel;

#[ORM\Entity]
#[ORM\Table(name: 'faros_comment_comment_closure')]
#[ORM\UniqueConstraint(name: 'closure_unique_idx', columns: ['ancestor', 'descendant'])]
#[ORM\Index(name: 'closure_depth_idx', columns: ['depth'])]
class CommentClosure extends CommentClosureModel
{
    /**
     * @var Comment
     */
    #[ORM\ManyToOne(targetEntity: Comment::class, inversedBy: 'descendants', fetch: 'LAZY')]
    #[ORM\JoinColumn(name: 'ancestor', referencedColumnName: 'id', nullable: false, onDelete: 'CASCADE')]
    protected $ancestor;

    /**
     * @var Comment
     */
    #[ORM\ManyToOne(targetEntity: Comment::class, inversedBy: 'ancestors', fetch: 'LAZY')]
    #[ORM\JoinColumn(name: 'descendant', referencedColumnName: 'id', nullable: false, onDelete: 'CASCADE')]
    protected $descendant;
}
