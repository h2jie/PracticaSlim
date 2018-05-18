<?php

namespace App\entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * Notes
 *
 * @ORM\Table(name="notes")
 * @ORM\Entity
 */
class Notes
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo", type="string", length=40, nullable=false)
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=150, nullable=false)
     */
    private $descripcion;

    /**
     * @var bool
     *
     * @ORM\Column(name="privada", type="boolean", nullable=false)
     */
    private $privada;

    /**
     * @var string
     *
     * @ORM\Column(name="tag1", type="string", length=20, nullable=true)
     */
    private $tag1;

    /**
     * @var string
     *
     * @ORM\Column(name="tag2", type="string", length=20, nullable=true)
     */
    private $tag2;

    /**
     * @var string
     *
     * @ORM\Column(name="tag3", type="string", length=20, nullable=true)
     */
    private $tag3;

    /**
     * @var string
     *
     * @ORM\Column(name="tag4", type="string", length=20, nullable=true)
     */
    private $tag4;

    /**
     * @var string
     *
     * @ORM\Column(name="book", type="string", length=150, nullable=false)
     */
    private $book;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_creacion", type="datetime", nullable=false)
     */
    private $fechaCreacion;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="ultima_modificacion", type="datetime", nullable=true)
     */
    private $ultimaModificacion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="usuario", type="string", length=50, nullable=true)
     */
    private $usuario;

    /**
     * @return array
     */
    public function getArray()
    {
        return get_object_vars($this);
    }

    /**
     * @return string
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * @param string $titulo
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    /**
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param string $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    /**
     * @return bool
     */
    public function isPrivada()
    {
        return $this->privada;
    }

    /**
     * @param bool $privada
     */
    public function setPrivada($privada)
    {
        $this->privada = $privada;
    }

    /**
     * @return string
     */
    public function getTag1()
    {
        return $this->tag1;
    }

    /**
     * @param string $tag1
     */
    public function setTag1($tag1)
    {
        $this->tag1 = $tag1;
    }

    /**
     * @return string
     */
    public function getTag2()
    {
        return $this->tag2;
    }

    /**
     * @param string $tag2
     */
    public function setTag2($tag2)
    {
        $this->tag2 = $tag2;
    }

    /**
     * @return string
     */
    public function getTag3()
    {
        return $this->tag3;
    }

    /**
     * @param string $tag3
     */
    public function setTag3($tag3)
    {
        $this->tag3 = $tag3;
    }

    /**
     * @return string
     */
    public function getTag4()
    {
        return $this->tag4;
    }

    /**
     * @param string $tag4
     */
    public function setTag4($tag4)
    {
        $this->tag4 = $tag4;
    }

    /**
     * @return string
     */
    public function getBook()
    {
        return $this->book;
    }

    /**
     * @param string $book
     */
    public function setBook($book)
    {
        $this->book = $book;
    }

    /**
     * @return DateTime
     */
    public function getFechaCreacion()
    {
        return $this->fechaCreacion;
    }

    /**
     * @param DateTime $fechaCreacion
     */
    public function setFechaCreacion($fechaCreacion)
    {
        $this->fechaCreacion = $fechaCreacion;
    }

    /**
     * @return DateTime
     */
    public function getUltimaModificacion()
    {
        return $this->ultimaModificacion;
    }

    /**
     * @param DateTime $ultimaModificacion
     */
    public function setUltimaModificacion($ultimaModificacion)
    {
        $this->ultimaModificacion = $ultimaModificacion;
    }

    /**
     * @return string
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param string $usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }


}
