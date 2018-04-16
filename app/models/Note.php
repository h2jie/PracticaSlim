<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 2018/4/16
 * Time: 下午6:34
 */

class Note
{
    /**
     * @var int $id
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $contnet;

    /**
     * @var boolean
     */
    private $private;

    /**
     * @var string
     */
    private $tag1;

    /**
     * @var string
     */
    private $tag2;

    /**
     * @var string
     */
    private $tag3;

    /**
     * @var string
     */
    private $tag4;

    /**
     * @var string
     */
    private $book;

    /**
     * @var DateTime
     */
    private $createDate;

    /**
     * @var DateTime
     */
    private $lastModificationsDate;

    /**
     * @var integer $user
     */
    private $user;

    /**
     * Note constructor.
     * @param string $title
     * @param string $contnet
     * @param bool $private
     * @param string $tag1
     * @param string $tag2
     * @param string $tag3
     * @param string $tag4
     * @param string $book
     * @param DateTime $createDate
     * @param DateTime $lastModificationsDate
     * @param int $user
     */
    public function __construct($title, $contnet, $private, $tag1, $tag2, $tag3, $tag4, $book, DateTime $createDate, DateTime $lastModificationsDate, $user)
    {
        $this->title = $title;
        $this->contnet = $contnet;
        $this->private = $private;
        $this->tag1 = $tag1;
        $this->tag2 = $tag2;
        $this->tag3 = $tag3;
        $this->tag4 = $tag4;
        $this->book = $book;
        $this->createDate = $createDate;
        $this->lastModificationsDate = $lastModificationsDate;
        $this->user = $user;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getContnet()
    {
        return $this->contnet;
    }

    /**
     * @param string $contnet
     */
    public function setContnet($contnet)
    {
        $this->contnet = $contnet;
    }

    /**
     * @return bool
     */
    public function isPrivate()
    {
        return $this->private;
    }

    /**
     * @param bool $private
     */
    public function setPrivate($private)
    {
        $this->private = $private;
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
    public function getCreateDate()
    {
        return $this->createDate;
    }

    /**
     * @param DateTime $createDate
     */
    public function setCreateDate($createDate)
    {
        $this->createDate = $createDate;
    }

    /**
     * @return DateTime
     */
    public function getLastModificationsDate()
    {
        return $this->lastModificationsDate;
    }

    /**
     * @param DateTime $lastModificationsDate
     */
    public function setLastModificationsDate($lastModificationsDate)
    {
        $this->lastModificationsDate = $lastModificationsDate;
    }

    /**
     * @return int
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param int $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

}