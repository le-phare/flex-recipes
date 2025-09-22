<?php

namespace App\Entity\Basedoc;

use App\Repository\Basedoc\FolderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Faros\Bundle\BasedocBundle\Entity\Folder as FarosFolder;
use Faros\Bundle\BasedocBundle\Entity\FolderInterface;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\Serializer\Attribute\Groups;
use Symfony\Component\Serializer\Attribute\MaxDepth;

#[ORM\Entity(repositoryClass: FolderRepository::class)]
#[ORM\Table(name: 'faros_basedoc_folder')]
class Folder extends FarosFolder
{
    use BlameableEntity;
    use TimestampableEntity;

    /**
     * @var Collection<array-key, Document>
     */
    #[ORM\ManyToMany(targetEntity: Document::class, mappedBy: 'folders')]
    #[Groups('basedoc.folder.get')]
    #[MaxDepth(1)]
    protected Collection $documents;

    /**
     * @var Collection<array-key, Folder>
     */
    #[ORM\OneToMany(targetEntity: Folder::class, mappedBy: 'parentFolder', cascade: ['remove'])]
    #[Groups('basedoc.folder.get')]
    #[MaxDepth(1)]
    protected Collection $childrenFolders;

    /** @var Folder|null */
    #[ORM\ManyToOne(targetEntity: Folder::class, cascade: ['persist'], inversedBy: 'childrenFolders')]
    #[Groups('basedoc.folder.get')]
    protected ?FolderInterface $parentFolder;

    /**
     * @var Collection<array-key, FolderAccessRight>
     */
    #[ORM\OneToMany(targetEntity: FolderAccessRight::class, mappedBy: 'folder', cascade: ['persist', 'remove'], orphanRemoval: true)]
    #[Groups(['basedoc.folder.get', 'basedoc.document.get'])]
    protected Collection $accessRights;

    public function __construct()
    {
        parent::__construct();
        $this->childrenFolders = new ArrayCollection();
        $this->accessRights = new ArrayCollection();
        $this->documents = new ArrayCollection();
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
