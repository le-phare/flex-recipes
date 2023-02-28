<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Faros\Component\Parameter\Model\Parameter as ParameterModel;
use Faros\Bundle\ParameterBundle\ORM\ParameterRepository;

/**
 * @ORM\Entity(repositoryClass=ParameterRepository::class)
 * @ORM\Table(name="faros_parameter")
 */
#[ORM\Entity(repositoryClass: ParameterRepository::class)]
#[ORM\Table(name: 'faros_parameter')]
class Parameter extends ParameterModel
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    #[ORM\Column(type: 'integer')]
    protected $id;
}
