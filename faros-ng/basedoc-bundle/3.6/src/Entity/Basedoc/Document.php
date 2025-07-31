<?php

namespace App\Entity\Basedoc;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Faros\Bundle\BasedocBundle\Repository\DocumentRepository;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\Serializer\Attribute\Groups;

#[ORM\Entity(repositoryClass: DocumentRepository::class)]
#[ORM\Table(name: 'faros_basedoc_document')]
class Document extends \Faros\Bundle\BasedocBundle\Entity\Document
{
    use BlameableEntity;
    use TimestampableEntity;

    /**
     * @var Collection<int, Folder>
     */
    #[ORM\JoinTable(name: 'faros_basedoc_folder_document')]
    #[ORM\InverseJoinColumn(name: 'folder_id', referencedColumnName: 'id')]
    #[ORM\ManyToMany(targetEntity: Folder::class, inversedBy: 'documents')]
    protected Collection $folders;

    public function __construct()
    {
        parent::__construct();
        $this->folders = new ArrayCollection();
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
