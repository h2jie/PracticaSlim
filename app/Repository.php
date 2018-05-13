<?php

namespace app;


use Doctrine\ORM\EntityManager;

abstract class Repository
{
    /**
     * @var EntityManager
     */
    protected $entityManager;

    /**
     * AbstractResource constructor.
     * @param $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }
}