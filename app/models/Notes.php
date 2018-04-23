<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Notes
 *
 * @ORM\Table(name="notes", indexes={@ORM\Index(name="fk_user", columns={"id_usuario"})})
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
     * @ORM\Column(name="title", type="string", length=40, nullable=false)
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="content", type="text", length=65535, nullable=true)
     */
    private $content;

    /**
     * @var bool
     *
     * @ORM\Column(name="private", type="boolean", nullable=false)
     */
    private $private;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tag1", type="string", length=11, nullable=true)
     */
    private $tag1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tag2", type="string", length=11, nullable=true)
     */
    private $tag2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tag3", type="string", length=11, nullable=true)
     */
    private $tag3;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tag4", type="string", length=11, nullable=true)
     */
    private $tag4;

    /**
     * @var string
     *
     * @ORM\Column(name="book", type="string", length=20, nullable=false)
     */
    private $book;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="create_date", type="datetime", nullable=false)
     */
    private $createDate;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="last_modification", type="datetime", nullable=true)
     */
    private $lastModification;

    /**
     * @var \Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_usuario", referencedColumnName="id")
     * })
     */
    private $idUsuario;


}
