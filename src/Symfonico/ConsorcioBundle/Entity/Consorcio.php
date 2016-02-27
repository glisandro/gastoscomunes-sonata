<?php

namespace Symfonico\ConsorcioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bridge\Doctrine\Validator\Constraints as DoctrineAssert;
use Gedmo\Mapping\Annotation as Gedmo;

use AppBundle\Entity\Traits\DateTimeTrait;
use AppBundle\Entity\Traits\IdentifiableTrait;

/**
* @ORM\Table(name="consorcios")
* @ORM\Entity(repositoryClass="Symfonico\ConsorcioBundle\Repository\ConsorcioRepository")
* @Gedmo\Loggable()
*/

class Consorcio
{
	use DateTimeTrait;
    use IdentifiableTrait;

    /**
     * Use constants to define configuration options that rarely change instead
     * of specifying them in app/config/config.yml.
     * See http://symfony.com/doc/current/best_practices/configuration.html#constants-vs-configuration-options
     */
    const NUM_ITEMS = 10;

	/** 
     * @ORM\Column(
     *      type = "string",
     *      length = 100
     * )
     * @Gedmo\Versioned() 
     */
	protected $nombre;

    /**
     * @Gedmo\Slug(
     *      fields = {"nombre"}
     * )
     * @ORM\Column(
     *      length = 128,
     *      unique = true,
     *      type = "string",
     *      nullable = false
     * )
     * @Gedmo\Versioned()
     */
	protected $slug;

    /**
     * @ORM\OneToMany(
     *      targetEntity = "Propiedad",
     *      mappedBy = "consorcio",
     *      orphanRemoval = true
     * )
     */
    protected $propiedades;

    /**
     * @ORM\OneToMany(
     *      targetEntity = "Presupuesto",
     *      mappedBy = "consorcio",
     *      orphanRemoval = true
     * )
     */
    protected $presupuestos;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->propiedades = new ArrayCollection();
    }
	
	public function setNombre($nombre)
	{
		$this->nombre = $nombre;
	}
	
	public function getNombre()
	{
		return $this->nombre;
	}
	
	public function setSlug($slug)
	{
		$this->slug = $slug;
	}
	
	public function getSlug()
	{
		return $this->slug;
	}

    /**
     * @ORM\PreUpdate
     */
    public function setCreatedValue()
    {
        $this->slug = $this->getNombre();
    }


    /**
     * Get all associated categories
     * @return Category[]
     */
    public function getPropiedades()
    {
        return $this->propiedades;
    }

	/**
     * Add a category in the product association.
     * (Owning side)
     * @param $category Category the category to associate
     */
    public function addPropiedad(Propiedad $propiedad) 
    {
        $this->propiedades->add($propiedad);
        $propiedad->setConsorcio($this);
    }

    /**
     * Remove a category in the product association.
     * (Owning side)
     * @param $category Category the category to associate
     */
    public function removePropiedad(Propiedad $propiedad) 
    {
        $this->propiedades->removeElement($propiedad);
        $propiedad->setConsorcio(null);
    }

    /**
     * Add propiedades
     *
     * @param \Symfonico\ConsorcioBundle\Entity\Propiedad $propiedades
     * @return Consorcio
     */
    public function addPropiedade(\Symfonico\ConsorcioBundle\Entity\Propiedad $propiedades)
    {
        $this->propiedades[] = $propiedades;

        return $this;
    }

    /**
     * Remove propiedades
     *
     * @param \Symfonico\ConsorcioBundle\Entity\Propiedad $propiedades
     */
    public function removePropiedade(\Symfonico\ConsorcioBundle\Entity\Propiedad $propiedades)
    {
        $this->propiedades->removeElement($propiedades);
    }

    public function __toString()
    {
        return strval($this->nombre);
    }
}
