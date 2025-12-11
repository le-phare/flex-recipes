<?php

namespace App\Entity\Basedoc;

use Doctrine\ORM\Mapping as ORM;
use Faros\Bundle\BasedocBundle\Entity\FolderAccessRight as FarosFolderAccessRight;
use Faros\Bundle\BasedocBundle\Entity\FolderInterface;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\Serializer\Attribute\Groups;

#[ORM\Entity]
#[ORM\Table(name: 'faros_basedoc_folder_access_right')]
class FolderAccessRight extends FarosFolderAccessRight
{
    use BlameableEntity;
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    protected ?int $id = null;

    /** @var Folder */
    #[ORM\ManyToOne(targetEntity: Folder::class, cascade: ['persist'], inversedBy: 'accessRights')]
    #[ORM\JoinColumn(nullable: false)]
    protected FolderInterface $folder;

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
