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
     * @ORM\OneToOne(targetEntity="Actividad", cascade={"persist"})
     * @ORM\JoinColumn(name="actSig_id", referencedColumnName="id")
     */
    private $actSig;

     /**
     * @ORM\OneToOne(targetEntity="Actividad", cascade={"persist"})
     * @ORM\JoinColumn(name="actAnt_id", referencedColumnName="id")
     */
    private $actAnt;

     /**
     * @ORM\OneToOne(targetEntity="Actividad", cascade={"persist"})
     * @ORM\JoinColumn(name="id_act_prueba", referencedColumnName="id")
     */
    private $actprueba;

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
    private $responsable;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Tati\ProcesoBundle\Entity\Proceso", inversedBy="actividades", cascade={"persist"})
     * @ORM\JoinColumn(name="proceso_id", referencedColumnName="id")
     */
    private $Proceso;

    /**
     * @var integer
     *
     * @ORM\Column(name="tiempo", type="integer")
     */
    private $tiempo;

    /**
     * @ORM\OneToMany(targetEntity="Tarea", mappedBy="actividades", cascade={"persist"})
     */
    private $tareas;

    /**
     * @ORM\OneToOne(targetEntity="User", inversedBy="Actividad")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

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



    /**
     * Set actSig
     *
     * @param \Tati\ProcesoBundle\Entity\Actividad $actSig
     * @return Actividad
     */
    public function setActSig(\Tati\ProcesoBundle\Entity\Actividad $actSig = null)
    {
        $this->actSig = $actSig;

        return $this;
    }

    /**
     * Get actSig
     *
     * @return \Tati\ProcesoBundle\Entity\Actividad 
     */
    public function getActSig()
    {
        return $this->actSig;
    }

    /**
     * Set actAnt
     *
     * @param \Tati\ProcesoBundle\Entity\Actividad $actAnt
     * @return Actividad
     */
    public function setActAnt(\Tati\ProcesoBundle\Entity\Actividad $actAnt = null)
    {
        $this->actAnt = $actAnt;

        return $this;
    }

    /**
     * Get actAnt
     *
     * @return \Tati\ProcesoBundle\Entity\Actividad 
     */
    public function getActAnt()
    {
        return $this->actAnt;
    }

    /**
     * Set actprueba
     *
     * @param \Tati\ProcesoBundle\Entity\Actividad $actprueba
     * @return Actividad
     */
    public function setActprueba(\Tati\ProcesoBundle\Entity\Actividad $actprueba = null)
    {
        $this->actprueba = $actprueba;

        return $this;
    }

    /**
     * Get actprueba
     *
     * @return \Tati\ProcesoBundle\Entity\Actividad 
     */
    public function getActprueba()
    {
        return $this->actprueba;
    }

    /**
     * Set responsable
     *
     * @param \Tati\ProcesoBundle\Entity\Responsable $responsable
     * @return Actividad
     */
    public function setResponsable(\Tati\ProcesoBundle\Entity\Responsable $responsable = null)
    {
        $this->responsable = $responsable;

        return $this;
    }

    /**
     * Get responsable
     *
     * @return \Tati\ProcesoBundle\Entity\Responsable 
     */
    public function getResponsable()
    {
        return $this->responsable;
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
     * @param \Tati\ProcesoBundle\Entity\Tarea $tareas
     * @return Actividad
     */
    public function addTarea(\Tati\ProcesoBundle\Entity\Tarea $tareas)
    {
        $this->tareas[] = $tareas;

        return $this;
    }

    /**
     * Remove tareas
     *
     * @param \Tati\ProcesoBundle\Entity\Tarea $tareas
     */
    public function removeTarea(\Tati\ProcesoBundle\Entity\Tarea $tareas)
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
     * Set user
     *
     * @param \Tati\ProcesoBundle\Entity\User $user
     * @return Actividad
     */
    public function setUser(\Tati\ProcesoBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Tati\ProcesoBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    public function setActividad($data)
    {
        $this->nombre = $data['nombre'];
        // $this->idActSig = $data['idActSig'];
        // $this->idActAnt = $data['idActAnt'];
        $this->tiempo = $data['tiempo'];
        $this->descripcion = $data['descripcion'];
    }

    /**
     * Set tiempo
     *
     * @param integer $tiempo
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
     * @return integer 
     */
    public function getTiempo()
    {
        return $this->tiempo;
    }
}
