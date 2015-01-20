<?php

namespace VVM\CyclovoyageurBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Etape
 *
 * @ORM\Table(name="etape")
 * @ORM\Entity
 */
class Etape
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @orm\OneToOne(targetEntity="VVM\CyclovoyageurBundle\Entity\Arret")
     * @orm\JoinColumn(nullable=false)
     */
    private $startingPoint;

    /**
     * @orm\OneToOne(targetEntity="VVM\CyclovoyageurBundle\Entity\Arret")
     * @orm\JoinColumn(nullable=false)
     */
    private $endingPoint;

    /**
     * @orm\ManyToMany(targetEntity="VVM\CyclovoyageurBundle\Entity\Arret")
     * @orm\JoinColumn(nullable=true)
     */
    private $arrets;

    /**
     * @ORM\ManyToOne(targetEntity="VVM\CyclovoyageurBundle\Entity\Voyage", inversedBy="etapes")
     * @ORM\JoinColumn(name="voyageid", referencedColumnName="id")
     */
    private $voyage;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->arrets = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Etape
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Etape
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set startingPoint
     *
     * @param \VVM\CyclovoyageurBundle\Entity\Arret $startingPoint
     * @return Etape
     */
    public function setStartingPoint(\VVM\CyclovoyageurBundle\Entity\Arret $startingPoint)
    {
        $this->startingPoint = $startingPoint;

        return $this;
    }

    /**
     * Get startingPoint
     *
     * @return \VVM\CyclovoyageurBundle\Entity\Arret 
     */
    public function getStartingPoint()
    {
        return $this->startingPoint;
    }

    /**
     * Set endingPoint
     *
     * @param \VVM\CyclovoyageurBundle\Entity\Arret $endingPoint
     * @return Etape
     */
    public function setEndingPoint(\VVM\CyclovoyageurBundle\Entity\Arret $endingPoint)
    {
        $this->endingPoint = $endingPoint;

        return $this;
    }

    /**
     * Get endingPoint
     *
     * @return \VVM\CyclovoyageurBundle\Entity\Arret 
     */
    public function getEndingPoint()
    {
        return $this->endingPoint;
    }

    /**
     * Add arrets
     *
     * @param \VVM\CyclovoyageurBundle\Entity\Arret $arrets
     * @return Etape
     */
    public function addArret(\VVM\CyclovoyageurBundle\Entity\Arret $arrets)
    {
        $this->arrets[] = $arrets;

        return $this;
    }

    /**
     * Remove arrets
     *
     * @param \VVM\CyclovoyageurBundle\Entity\Arret $arrets
     */
    public function removeArret(\VVM\CyclovoyageurBundle\Entity\Arret $arrets)
    {
        $this->arrets->removeElement($arrets);
    }

    /**
     * Get arrets
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getArrets()
    {
        return $this->arrets;
    }

    /**
     * Set voyage
     *
     * @param \VVM\CyclovoyageurBundle\Entity\Voyage $voyage
     * @return Etape
     */
    public function setVoyage(\VVM\CyclovoyageurBundle\Entity\Voyage $voyage = null)
    {
        $this->voyage = $voyage;

        return $this;
    }

    /**
     * Get voyage
     *
     * @return \VVM\CyclovoyageurBundle\Entity\Voyage 
     */
    public function getVoyage()
    {
        return $this->voyage;
    }
}
