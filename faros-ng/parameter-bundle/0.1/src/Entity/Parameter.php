<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Faros\Component\Parameter\Model\Parameter as ParameterModel;

/**
 * @ORM\Entity(repositoryClass="Faros\Bundle\ParameterBundle\ORM\ParameterRepository")
 * @ORM\Table(name="faros_parameter")
 */
class Parameter extends ParameterModel
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    protected $id;
}
