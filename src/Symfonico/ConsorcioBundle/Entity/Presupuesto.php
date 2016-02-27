<?php

namespace Symfonico\ConsorcioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints as DoctrineAssert;
use Gedmo\Mapping\Annotation as Gedmo;

use AppBundle\Entity\Traits\DateTimeTrait;
use AppBundle\Entity\Traits\IdentifiableTrait;

/**
 * @ORM\Table(name="presupuestos")
 * @ORM\Entity(repositoryClass="Symfonico\ConsorcioBundle\Repository\PresupuestoRepository")
 * @Gedmo\Loggable()
 */

class Presupuesto
{
    use DateTimeTrait;
    use IdentifiableTrait;

    /**
     * @var Consorcio
     * @ORM\ManyToOne(
     *      targetEntity = "Consorcio", 
     *      inversedBy = "presupuestos"
     * )
     * @ORM\JoinColumn(
     *      name = "consorcio_id",
     *      referencedColumnName = "id"
     * )
     **/
    protected $consorcio;

    /**
     * @var \Date
     *
     * @ORM\Column(name="periodo", type="date", nullable=false)
     */
    protected $periodo;

    /**
     * @var string
     *
     * @ORM\Column(name="presupuesto1", type="decimal", precision=19, scale=2, nullable=true, options={"default" = 0}))
     */
    protected $presupuesto1 = 0.00;

    /**
     * @var string
     *
     * @ORM\Column(name="presupuesto2", type="decimal", precision=19, scale=2, nullable=true, options={"default" = 0}))
     */
    protected $presupuesto2 = 0.00;

    /**
     * @var string
     *
     * @ORM\Column(name="presupuesto3", type="decimal", precision=19, scale=2, nullable=true, options={"default" = 0}))
     */
    protected $presupuesto3 = 0.00;

    /**
     * @var string
     *
     * @ORM\Column(name="presupuesto4", type="decimal", precision=19, scale=2, nullable=true, options={"default" = 0}))
     */
    protected $presupuesto4 = 0.00;

    /**
     * @var string
     *
     * @ORM\Column(name="presupuesto5", type="decimal", precision=19, scale=2, nullable=true, options={"default" = 0}))
     */
    protected $presupuesto5 = 0.00;

    /**
     * @var string
     *
     * @ORM\Column(name="presupuesto6", type="decimal", precision=19, scale=2, nullable=true, options={"default" = 0}))
     */
    protected $presupuesto6 = 0.00;

    /**
     * @var string
     *
     * @ORM\Column(name="presupuesto7", type="decimal", precision=19, scale=2, nullable=true, options={"default" = 0}))
     */
    protected $presupuesto7 = 0.00;

    /**
     * @var string
     *
     * @ORM\Column(name="presupuesto8", type="decimal", precision=19, scale=2, nullable=true, options={"default" = 0}))
     */
    protected $presupuesto8 = 0.00;

    /**
     * @var string
     *
     * @ORM\Column(name="presupuesto9", type="decimal", precision=19, scale=2, nullable=true, options={"default" = 0}))
     */
    protected $presupuesto9 = 0.00;

    /**
     * @var string
     *
     * @ORM\Column(name="presupuesto10", type="decimal", precision=19, scale=2, nullable=true, options={"default" = 0}))
     */
    protected $presupuesto10 = 0.00;

    public function __construct() 
    {
        $this->periodo = new \DateTime();
    }

    /**
     * Set periodo
     *
     * @param \DateTime $periodo
     *
     * @return Presupuestos
     */
    public function setPeriodo($periodo)
    {
        $this->periodo = $periodo;

        return $this;
    }

    /**
     * Get periodo
     *
     * @return \DateTime
     */
    public function getPeriodo()
    {
        return $this->periodo;
    }

    /**
     * Set presupuesto1
     *
     * @param string $presupuesto1
     *
     * @return Presupuestos
     */
    public function setPresupuesto1($presupuesto1)
    {
        $this->presupuesto1 = $presupuesto1;

        return $this;
    }

    /**
     * Get presupuesto1
     *
     * @return string
     */
    public function getPresupuesto1()
    {
        return $this->presupuesto1;
    }

    /**
     * Set presupuesto2
     *
     * @param string $presupuesto2
     *
     * @return Presupuestos
     */
    public function setPresupuesto2($presupuesto2)
    {
        $this->presupuesto2 = $presupuesto2;

        return $this;
    }

    /**
     * Get presupuesto2
     *
     * @return string
     */
    public function getPresupuesto2()
    {
        return $this->presupuesto2;
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
     * Set consorcio
     *
     * @param \Symfonico\ConsorcioBundle\Entity\Consorcio $consorcio
     *
     * @return Presupuestos
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

    /**
     * Set presupuesto3
     *
     * @param string $presupuesto3
     *
     * @return Presupuesto
     */
    public function setPresupuesto3($presupuesto3)
    {
        $this->presupuesto3 = $presupuesto3;

        return $this;
    }

    /**
     * Get presupuesto3
     *
     * @return string
     */
    public function getPresupuesto3()
    {
        return $this->presupuesto3;
    }

    /**
     * Set presupuesto4
     *
     * @param string $presupuesto4
     *
     * @return Presupuesto
     */
    public function setPresupuesto4($presupuesto4)
    {
        $this->presupuesto4 = $presupuesto4;

        return $this;
    }

    /**
     * Get presupuesto4
     *
     * @return string
     */
    public function getPresupuesto4()
    {
        return $this->presupuesto4;
    }

    /**
     * Set presupuesto5
     *
     * @param string $presupuesto5
     *
     * @return Presupuesto
     */
    public function setPresupuesto5($presupuesto5)
    {
        $this->presupuesto5 = $presupuesto5;

        return $this;
    }

    /**
     * Get presupuesto5
     *
     * @return string
     */
    public function getPresupuesto5()
    {
        return $this->presupuesto5;
    }

    /**
     * Set presupuesto6
     *
     * @param string $presupuesto6
     *
     * @return Presupuesto
     */
    public function setPresupuesto6($presupuesto6)
    {
        $this->presupuesto6 = $presupuesto6;

        return $this;
    }

    /**
     * Get presupuesto6
     *
     * @return string
     */
    public function getPresupuesto6()
    {
        return $this->presupuesto6;
    }

    /**
     * Set presupuesto7
     *
     * @param string $presupuesto7
     *
     * @return Presupuesto
     */
    public function setPresupuesto7($presupuesto7)
    {
        $this->presupuesto7 = $presupuesto7;

        return $this;
    }

    /**
     * Get presupuesto7
     *
     * @return string
     */
    public function getPresupuesto7()
    {
        return $this->presupuesto7;
    }

    /**
     * Set presupuesto8
     *
     * @param string $presupuesto8
     *
     * @return Presupuesto
     */
    public function setPresupuesto8($presupuesto8)
    {
        $this->presupuesto8 = $presupuesto8;

        return $this;
    }

    /**
     * Get presupuesto8
     *
     * @return string
     */
    public function getPresupuesto8()
    {
        return $this->presupuesto8;
    }

    /**
     * Set presupuesto9
     *
     * @param string $presupuesto9
     *
     * @return Presupuesto
     */
    public function setPresupuesto9($presupuesto9)
    {
        $this->presupuesto9 = $presupuesto9;

        return $this;
    }

    /**
     * Get presupuesto9
     *
     * @return string
     */
    public function getPresupuesto9()
    {
        return $this->presupuesto9;
    }

    /**
     * Set presupuesto10
     *
     * @param string $presupuesto10
     *
     * @return Presupuesto
     */
    public function setPresupuesto10($presupuesto10)
    {
        $this->presupuesto10 = $presupuesto10;

        return $this;
    }

    /**
     * Get presupuesto10
     *
     * @return string
     */
    public function getPresupuesto10()
    {
        return $this->presupuesto10;
    }
}
