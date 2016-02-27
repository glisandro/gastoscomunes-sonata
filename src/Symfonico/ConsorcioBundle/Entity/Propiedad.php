<?php

namespace Symfonico\ConsorcioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\ExecutionContextInterface;

use AppBundle\Entity\Traits\DateTimeTrait;
use AppBundle\Entity\Traits\IdentifiableTrait;

/**
 * Propiedad
 *
 * @ORM\Table(name="consorcios_propiedades")
 * @ORM\Entity(repositoryClass="Symfonico\ConsorcioBundle\Repository\PropiedadRepository")
 */
class Propiedad
{
    use DateTimeTrait;
    use IdentifiableTrait;

    /**
     * @var Consorcio
     * @ORM\ManyToOne(
     *      targetEntity = "Consorcio", 
     *      inversedBy = "propiedades"
     * )
     * @ORM\JoinColumn(
     *      name = "consorcio_id",
     *      referencedColumnName = "id"
     * )
     **/
    protected $consorcio;

    /**
     * @var string
     *
     * @ORM\Column(name = "denominacion", type = "string", length = 60, nullable = false, options = {"default" = 0})
     */
    protected $denominacion;


    /**
     * @var float
     *
     * @ORM\Column(name="coeficiente1", type="decimal", scale=6, precision=7, nullable=false, options={"default" = 0})
     * @Assert\Range(
     *      min = 0,
     *      max = 1,
     *      minMessage = "El mínimo es 0",
     *      maxMessage = "El máximo es 1"
     * )
     */
    protected $coeficiente1 = 0;

        /**
     * @var float
     *
     * @ORM\Column(name="coeficiente2", type="decimal", scale=6, precision=7, nullable=false, options={"default" = 0})
     * @Assert\Range(
     *      min = 0,
     *      max = 1,
     *      minMessage = "El mínimo es 0",
     *      maxMessage = "El máximo es 1"
     * )
     */
    protected $coeficiente2 = 0;

        /**
     * @var float
     *
     * @ORM\Column(name="coeficiente3", type="decimal", scale=6, precision=7, nullable=false, options={"default" = 0})
     * @Assert\Range(
     *      min = 0,
     *      max = 1,
     *      minMessage = "El mínimo es 0",
     *      maxMessage = "El máximo es 1"
     * )
     */
    protected $coeficiente3 = 0;

        /**
     * @var float
     *
     * @ORM\Column(name="coeficiente4", type="decimal", scale=6, precision=7, nullable=false, options={"default" = 0})
     * @Assert\Range(
     *      min = 0,
     *      max = 1,
     *      minMessage = "El mínimo es 0",
     *      maxMessage = "El máximo es 1"
     * )
     */
    protected $coeficiente4 = 0;

        /**
     * @var float
     *
     * @ORM\Column(name="coeficiente5", type="decimal", scale=6, precision=7, nullable=false, options={"default" = 0})
     * @Assert\Range(
     *      min = 0,
     *      max = 1,
     *      minMessage = "El mínimo es 0",
     *      maxMessage = "El máximo es 1"
     * )
     */
    protected $coeficiente5 = 0;

        /**
     * @var float
     *
     * @ORM\Column(name="coeficiente6", type="decimal", scale=6, precision=7, nullable=false, options={"default" = 0})
     * @Assert\Range(
     *      min = 0,
     *      max = 1,
     *      minMessage = "El mínimo es 0",
     *      maxMessage = "El máximo es 1"
     * )
     */
    protected $coeficiente6 = 0;

        /**
     * @var float
     *
     * @ORM\Column(name="coeficiente7", type="decimal", scale=6, precision=7, nullable=false, options={"default" = 0})
     * @Assert\Range(
     *      min = 0,
     *      max = 1,
     *      minMessage = "El mínimo es 0",
     *      maxMessage = "El máximo es 1"
     * )
     */
    protected $coeficiente7 = 0;

        /**
     * @var float
     *
     * @ORM\Column(name="coeficiente8", type="decimal", scale=6, precision=7, nullable=false, options={"default" = 0})
     * @Assert\Range(
     *      min = 0,
     *      max = 1,
     *      minMessage = "El mínimo es 0",
     *      maxMessage = "El máximo es 1"
     * )
     */
    protected $coeficiente8 = 0;

        /**
     * @var float
     *
     * @ORM\Column(name="coeficiente9", type="decimal", scale=6, precision=7, nullable=false, options={"default" = 0})
     * @Assert\Range(
     *      min = 0,
     *      max = 1,
     *      minMessage = "El mínimo es 0",
     *      maxMessage = "El máximo es 1"
     * )
     */
    protected $coeficiente9 = 0;

        /**
     * @var float
     *
     * @ORM\Column(name="coeficiente10", type="decimal", scale=6, precision=7, nullable=false, options={"default" = 0})
     * @Assert\Range(
     *      min = 0,
     *      max = 1,
     *      minMessage = "El mínimo es 0",
     *      maxMessage = "El máximo es 1"
     * )
     */
    protected $coeficiente10 = 0;

  

    /**
     * Constructor
     */
    public function __construct()
    {
        //Initialize product as a Doctrine Collection
        //$this->consorcio = new ArrayCollection();   
    }

    /**
     * Set denominacion
     *
     * @param string $denominacion
     *
     * @return Propiedad
     */
    public function setDenominacion($denominacion)
    {
        $this->denominacion = $denominacion;

        return $this;
    }

    /**
     * Get denominacion
     *
     * @return string
     */
    public function getDenominacion()
    {
        return $this->denominacion;
    }

    /**
     * Set coeficiente1
     *
     * @param string $coeficiente1
     *
     * @return Propiedad
     */
    public function setCoeficiente1($coeficiente1)
    {
        $this->coeficiente1 = $coeficiente1;

        return $this;
    }

    /**
     * Get coeficiente1
     *
     * @return string
     */
    public function getCoeficiente1()
    {
        return $this->coeficiente1;
    }

    /**
     * Set coeficiente2
     *
     * @param string $coeficiente2
     *
     * @return Propiedad
     */
    public function setCoeficiente2($coeficiente2)
    {
        $this->coeficiente2 = $coeficiente2;

        return $this;
    }

    /**
     * Get coeficiente2
     *
     * @return string
     */
    public function getCoeficiente2()
    {
        return $this->coeficiente2;
    }

    /**
     * Set coeficiente3
     *
     * @param string $coeficiente3
     *
     * @return Propiedad
     */
    public function setCoeficiente3($coeficiente3)
    {
        $this->coeficiente3 = $coeficiente3;

        return $this;
    }

    /**
     * Get coeficiente3
     *
     * @return string
     */
    public function getCoeficiente3()
    {
        return $this->coeficiente3;
    }

    /**
     * Set coeficiente4
     *
     * @param string $coeficiente4
     *
     * @return Propiedad
     */
    public function setCoeficiente4($coeficiente4)
    {
        $this->coeficiente4 = $coeficiente4;

        return $this;
    }

    /**
     * Get coeficiente4
     *
     * @return string
     */
    public function getCoeficiente4()
    {
        return $this->coeficiente4;
    }

    /**
     * Set coeficiente5
     *
     * @param string $coeficiente5
     *
     * @return Propiedad
     */
    public function setCoeficiente5($coeficiente5)
    {
        $this->coeficiente5 = $coeficiente5;

        return $this;
    }

    /**
     * Get coeficiente5
     *
     * @return string
     */
    public function getCoeficiente5()
    {
        return $this->coeficiente5;
    }

    /**
     * Set coeficiente6
     *
     * @param string $coeficiente6
     *
     * @return Propiedad
     */
    public function setCoeficiente6($coeficiente6)
    {
        $this->coeficiente6 = $coeficiente6;

        return $this;
    }

    /**
     * Get coeficiente6
     *
     * @return string
     */
    public function getCoeficiente6()
    {
        return $this->coeficiente6;
    }

    /**
     * Set coeficiente7
     *
     * @param string $coeficiente7
     *
     * @return Propiedad
     */
    public function setCoeficiente7($coeficiente7)
    {
        $this->coeficiente7 = $coeficiente7;

        return $this;
    }

    /**
     * Get coeficiente7
     *
     * @return string
     */
    public function getCoeficiente7()
    {
        return $this->coeficiente7;
    }

    /**
     * Set coeficiente8
     *
     * @param string $coeficiente8
     *
     * @return Propiedad
     */
    public function setCoeficiente8($coeficiente8)
    {
        $this->coeficiente8 = $coeficiente8;

        return $this;
    }

    /**
     * Get coeficiente8
     *
     * @return string
     */
    public function getCoeficiente8()
    {
        return $this->coeficiente8;
    }

    /**
     * Set coeficiente9
     *
     * @param string $coeficiente9
     *
     * @return Propiedad
     */
    public function setCoeficiente9($coeficiente9)
    {
        $this->coeficiente9 = $coeficiente9;

        return $this;
    }

    /**
     * Get coeficiente9
     *
     * @return string
     */
    public function getCoeficiente9()
    {
        return $this->coeficiente9;
    }

    /**
     * Set coeficiente10
     *
     * @param string $coeficiente10
     *
     * @return Propiedad
     */
    public function setCoeficiente10($coeficiente10)
    {
        $this->coeficiente10 = $coeficiente10;

        return $this;
    }

    /**
     * Get coeficiente10
     *
     * @return string
     */
    public function getCoeficiente10()
    {
        return $this->coeficiente10;
    }

    /**
     * Set consorcio
     *
     * @param \Symfonico\ConsorcioBundle\Entity\Consorcio $consorcio
     *
     * @return Propiedad
     */
    public function setConsorcio(\Symfonico\ConsorcioBundle\Entity\Consorcio $consorcio = null)
    {
        $this->consorcio = $consorcio;

        return $this;
    }

    /**
     * Get consorcio
     *
     * @return \Symfonico\ConsorcioBundle\Entity\Consorcio
     */
    public function getConsorcio()
    {
        return $this->consorcio;
    }

    public function __toString()
    {
        return strval($this->getDenominacion());
    }
}
