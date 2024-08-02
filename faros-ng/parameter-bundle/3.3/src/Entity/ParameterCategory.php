<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Faros\Bundle\ParameterBundle\ORM\ParameterCategoryRepository;
use Faros\Component\Parameter\Model\ParameterCategory as ParameterCategoryModel;

#[ORM\Entity(repositoryClass: ParameterCategoryRepository::class)]
#[ORM\Table(name: 'faros_parameter_category')]
class ParameterCategory extends ParameterCategoryModel
{
    /**
     * @var int|null
     */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    protected $id;
}
