<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Faros\Bundle\ParameterBundle\ORM\ParameterCategoryRepository;
use Faros\Component\Parameter\Model\ParameterCategory as ParameterCategoryModel;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity(repositoryClass: ParameterCategoryRepository::class)]
#[ORM\Table(name: 'faros_parameter_category')]
class ParameterCategory extends ParameterCategoryModel
{
    use BlameableEntity;
    use TimestampableEntity;

    /**
     * @var int|null
     */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    protected $id;
}
