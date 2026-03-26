<?php

namespace App\Entity\Basedoc;

use Doctrine\ORM\Mapping as ORM;
use Faros\Bundle\BasedocBundle\Entity\DocumentAccessRight as FarosDocumentAccessRight;
use Faros\Bundle\BasedocBundle\Entity\DocumentInterface;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\Serializer\Attribute\Groups;

#[ORM\Entity]
#[ORM\Table(name: 'faros_basedoc_document_access_right')]
class DocumentAccessRight extends FarosDocumentAccessRight
{
    use BlameableEntity;
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    protected ?int $id = null;

    /** @var Document */
    #[ORM\ManyToOne(targetEntity: Document::class, cascade: ['persist'], inversedBy: 'accessRights')]
    #[ORM\JoinColumn(nullable: false)]
    protected DocumentInterface $document;

    #[Groups(['basedoc.folder.get', 'basedoc.document.get'])]
    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    #[Groups(['basedoc.folder.get', 'basedoc.document.get'])]
    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }
}
