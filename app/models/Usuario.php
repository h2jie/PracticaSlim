<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Usuario
 *
 * @ORM\Table(name="usuario")
 * @ORM\Entity
 */
class Usuario
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
     * @var string|null
     *
     * @ORM\Column(name="username", type="string", length=20, nullable=true)
     */
    private $username;

    /**
     * @var string|null
     *
     * @ORM\Column(name="password", type="string", length=30, nullable=true)
     */
    private $password;

    /**
     * @var string|null
     *
     * @ORM\Column(name="token", type="string", length=100, nullable=true)
     */
    private $token;


}
