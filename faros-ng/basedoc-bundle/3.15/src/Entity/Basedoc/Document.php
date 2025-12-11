<?php

namespace App\Entity\Basedoc;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Faros\Bundle\BasedocBundle\Entity\Document as FarosDocument;
use Faros\Bundle\BasedocBundle\Repository\DocumentRepository;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\Serializer\Attribute\Groups;
use Symfony\Component\Serializer\Attribute\MaxDepth;

#[ORM\Entity(repositoryClass: DocumentRepository::class)]
#[ORM\Table(name: 'faros_basedoc_document')]
class Document extends FarosDocument
{
    use BlameableEntity;
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    protected ?int $id = null;

    /**
     * @var Collection<int, Folder>
     */
    #[ORM\JoinTable(name: 'faros_basedoc_folder_document')]
    #[ORM\InverseJoinColumn(name: 'folder_id', referencedColumnName: 'id')]
    #[ORM\ManyToMany(targetEntity: Folder::class, inversedBy: 'documents')]
    #[Groups(['basedoc.folder.get', 'basedoc.document.get'])]
    #[MaxDepth(1)]
    protected Collection $folders;

    /**
     * @var Collection<int, DocumentAccessRight>
     */
    #[ORM\OneToMany(targetEntity: DocumentAccessRight::class, mappedBy: 'document', cascade: ['persist', 'remove'], orphanRemoval: true)]
    #[Groups(['basedoc.folder.get', 'basedoc.document.get'])]
    protected Collection $accessRights;

    public function __construct()
    {
        parent::__construct();
        $this->folders = new ArrayCollection();
        $this->accessRights = new ArrayCollection();
    }

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
