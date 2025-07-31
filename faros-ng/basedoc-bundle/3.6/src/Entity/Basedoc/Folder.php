<?php

namespace App\Entity\Basedoc;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Faros\Bundle\BasedocBundle\Entity\FolderInterface;
use Faros\Bundle\BasedocBundle\Repository\FolderRepository;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\Serializer\Attribute\Groups;

#[ORM\Entity(repositoryClass: FolderRepository::class)]
#[ORM\Table(name: 'faros_basedoc_folder')]
class Folder extends \Faros\Bundle\BasedocBundle\Entity\Folder
{
    use BlameableEntity;
    use TimestampableEntity;

    /**
     * @var Collection<int, Document>
     */
    #[ORM\ManyToMany(targetEntity: Document::class, mappedBy: 'folders')]
    #[Groups('basedoc.folder.get')]
    protected Collection $documents;

    /**
     * @var Collection<int, Folder>
     */
    #[ORM\OneToMany(targetEntity: Folder::class, mappedBy: 'parentFolder', cascade: ['remove'])]
    #[Groups('basedoc.folder.get')]
    protected Collection $childrenFolders;

    /** @var Folder|null */
    #[ORM\ManyToOne(targetEntity: Folder::class, cascade: ['persist'], inversedBy: 'childrenFolders')]
    #[Groups('basedoc.folder.get')]
    protected ?FolderInterface $parentFolder;

    public function __construct()
    {
        parent::__construct();
        $this->childrenFolders = new ArrayCollection();
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
