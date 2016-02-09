<?php

namespace Tati\ProcesoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Actividad
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Actividad
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
     * @ORM\Column(name="nombre", type="string", length=100)
     */
    private $nombre;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_act_sig", type="integer")
     */
    private $idActSig;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_act_ant", type="integer")
     */
    private $idActAnt;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string")
     */
    private $descripcion;

    /**
     * @ORM\ManyToOne(targetEntity="Responsable", inversedBy="actividades")
     * @ORM\JoinColumn(name="responsable_id", referencedColumnName="id")
     */
    private $idResponsable;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Tati\ProcesoBundle\Entity\Proceso", inversedBy="actividades", cascade={"persist"})
     * @ORM\JoinColumn(name="proceso_id", referencedColumnName="id")
     */
    private $Proceso;

    /**
     * @var string
     *
     * @ORM\Column(name="tiempo", type="string", length=100)
     */
    private $tiempo;

    /**
     * @ORM\OneToMany(targetEntity="Tarea", mappedBy="actividades", cascade={"persist"})
     */
    private $tareas;

 

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tareas = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set nombre
     *
     * @param string $nombre
     * @return Actividad
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set idActSig
     *
     * @param integer $idActSig
     * @return Actividad
     */
    public function setIdActSig($idActSig)
    {
        $this->idActSig = $idActSig;

        return $this;
    }

    /**
     * Get idActSig
     *
     * @return integer 
     */
    public function getIdActSig()
    {
        return $this->idActSig;
    }

    /**
     * Set idActAnt
     *
     * @param integer $idActAnt
     * @return Actividad
     */
    public function setIdActAnt($idActAnt)
    {
        $this->idActAnt = $idActAnt;

        return $this;
    }

    /**
     * Get idActAnt
     *
     * @return integer 
     */
    public function getIdActAnt()
    {
        return $this->idActAnt;
    }



    /**
     * Set idResponsable
     *
     * @param integer $idResponsable
     * @return Actividad
     */
    public function setIdResponsable($idResponsable)
    {
        $this->idResponsable = $idResponsable;

        return $this;
    }

    /**
     * Get idResponsable
     *
     * @return integer 
     */
    public function getIdResponsable()
    {
        return $this->idResponsable;
    }

    /**
     * Set tiempo
     *
     * @param \DateTime $tiempo
     * @return Actividad
     */
    public function setTiempo($tiempo)
    {
        $this->tiempo = $tiempo;

        return $this;
    }

    /**
     * Get tiempo
     *
     * @return \DateTime 
     */
    public function getTiempo()
    {
        return $this->tiempo;
    }

    /**
     * Set Proceso
     *
     * @param \Tati\ProcesoBundle\Entity\Proceso $proceso
     * @return Actividad
     */
    public function setProceso(\Tati\ProcesoBundle\Entity\Proceso $proceso = null)
    {
        $this->Proceso = $proceso;

        return $this;
    }

    /**
     * Get Proceso
     *
     * @return \Tati\ProcesoBundle\Entity\Proceso 
     */
    public function getProceso()
    {
        return $this->Proceso;
    }

    /**
     * Add tareas
     *
     * @param \Tati\ProcesoBundle\Entity\tarea $tareas
     * @return Actividad
     */
    public function addTarea(\Tati\ProcesoBundle\Entity\tarea $tareas)
    {
        $this->tareas[] = $tareas;

        return $this;
    }

    /**
     * Remove tareas
     *
     * @param \Tati\ProcesoBundle\Entity\tarea $tareas
     */
    public function removeTarea(\Tati\ProcesoBundle\Entity\tarea $tareas)
    {
        $this->tareas->removeElement($tareas);
    }

    /**
     * Get tareas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTareas()
    {
        return $this->tareas;
    }

    /**
     * Set status
     *
     * @param boolean $status
     * @return Actividad
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return boolean 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set Actividad
     *
     *  
     */
    public function setActividad($data)
    {
        $this->nombre = $data['nombre'];
        $this->idActSig = $data['idActSig'];
        $this->idActAnt = $data['idActAnt'];
        $this->tiempo = $data['tiempo'];
        $this->descripcion = $data['descripcion'];
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Actividad
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }
}
