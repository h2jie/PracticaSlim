<?php
namespace App\Repository;

use App\entity\Notes;
use App\MainRepository;
use DateTime;
use Doctrine\DBAL\DBALException;
use Doctrine\ORM\ORMException;


class NoteRepository extends MainRepository
{
    /**
     * @return array
     */
    public function getRoutePage()
    {
        $mainPage = array('code' => 200, 'msg' => 'Wellcome to main route');
        return $mainPage;
    }

    /**
     * @return array
     */
    public function fetchAllNotes($optionalSort = null)
    {
        if ($optionalSort != null) {
            if (strtolower($optionalSort) == 'asc') {
                /**
                 * @var Notes[] $notes
                 */
                $notes = $this->entityManager->getRepository(Notes::class)->findBy(
                    array(),
                    array('title' => strtoupper($optionalSort))
                );
            } else if (strtolower($optionalSort) == 'desc') {
                /**
                 * @var Notes[] $notes
                 */
                $notes = $this->entityManager->getRepository(Notes::class)->findBy(
                    array(),
                    array('createdata' => strtoupper($optionalSort))
                );
            }
        } else {
            /**
             * @var Notes[] $notes
             */
            $notes = $this->entityManager->getRepository(Notes::class)->findAll();
        }

        if (empty($notes)) {
            $arr = array('code' => 204, 'msg' => 'No notes found');
            return $arr;
        } else {
            $notes = array_map(
                function (Notes $note) {
                    return $note->getArray();
                },
                $notes
            );

            $arr = array('code' => 200, 'msg' => $notes);
            return $arr;
        }
    }

    /**
     * @return array
     */
    public function fetchAllPublic($optionalSort = null)
    {
        if ($optionalSort != null) {
            if (strtolower($optionalSort) == 'asc') {
                /**
                 * @var Notes[] $publicNotes
                 */
                $publicNotes = $this->entityManager->getRepository(Notes::class)->findBy(
                    array('privada' => false),
                    array('titulo' => strtoupper($optionalSort))
                );
            } else if (strtolower($optionalSort) == 'desc') {
                /**
                 * @var Notes[] $publicNotes
                 */
                $publicNotes = $this->entityManager->getRepository(Notes::class)->findBy(
                    array('privada' => false),
                    array('fechaCreacion' => strtoupper($optionalSort))
                );
            }
        } else {
            /**
             * @var Notes[] $publicNotes
             */
            $publicNotes = $this->entityManager->getRepository(Notes::class)->findBy(array('privada' => false));
        }

        if (is_null($publicNotes)) {
            $arr = array('code' => 204, 'msg' => 'Could not found any notes');
            return $arr;
        } else {
            $publicNotes = array_map(
                function (Notes $note) {
                    return $note->getArray();
                },
                $publicNotes
            );

            $arr = array('code' => 200, 'msg' => $publicNotes);
            return $arr;
        }
    }

    /**
     * @param $id
     * @return array
     */
    public function fetchOneById($id)
    {
        /**
         * @var Notes $note
         */
        $note = $this->entityManager->getRepository(Notes::class)->findOneBy(array('id' => $id));

        if (empty($note)) {
            return array('code' => 204, 'msg' => 'No notes found with that id');
        } else {
            return array('code' => 200, 'msg' => $note->getArray());
        }
    }

    /**
     * @return array|null
     */
    public function insertNote($body)
    {
        $arr = null;

        $title = $body["titulo"];
        $content = $body["descripcio"];
        $private = $body["privada"];
        $tag1 = $body["tag1"];
        $tag2 = $body["tag2"];
        $tag3 = $body["tag3"];
        $tag4 = $body["tag4"];
        $book = $body["book"];
        $usuario = $body["usuario"];
        $createData = new DateTime();

        $notes = new Notes;
        $notes->setTitulo($title);
        $notes->setDescripcion($content);
        $notes->setPrivada($private);
        $notes->setTag1($tag1);
        $notes->setTag2($tag2);
        $notes->setTag3($tag3);
        $notes->setTag4($tag4);
        $notes->setBook($book);
        $notes->setFechaCreacion($createData);
        $notes->setUsuario($usuario);

        if ($title != "" || $title != null) {
            try {
                $this->entityManager->persist($notes);
                $this->entityManager->flush($notes);
                $arr = array('code' => 200, 'msg' => 'Note inserted correctly');
            } catch (ORMException $e) {
                $arr = array('code' => 409, 'msg' => 'Could not insert the note');
            }
        } else {
            $arr = array('code' => 409, 'msg' => 'Title must be insterted');
        }

        return $arr;
    }

    /**
     * @return int
     */
    public function removeNote($id)
    {
        /**
         * @var Notes $note
         */
        $note = $this->entityManager->getRepository(Notes::class)->findOneBy(array('id' => $id));

        if (is_null($note)) {
            return 204;
        }

        try {
            $this->entityManager->remove($note);
            $this->entityManager->flush();
            return 200;
        } catch (ORMException $exception) {
            return 409;
        }
    }

    /**
     * @param string|null $sort
     * @return array|null
     */
    public function fetchAllWithTag($tag)
    {
        $conn = $this->entityManager->getConnection();
        $sql = "SELECT * 
FROM notes 
WHERE (tag1 LIKE :tag 
OR tag2 LIKE :tag 
OR tag3 LIKE :tag 
OR tag4 LIKE :tag)
AND PRIVADA = 0";
            try {
                $stmt = $conn->prepare($sql);
                $stmt->bindValue('tag', $tag);

                $stmt->execute();
            } catch (DBALException $e) {
                return array('code' => 204, 'msg' => 'No notes found');
            }


            $notes = $stmt->fetchAll();


            if ($notes != null || !empty($notes)) {
                return array('code' => 200, 'msg' => $notes);
            } else {
                return array('code' => 204, 'msg' => 'No notes found');
            }


        return null;
    }

    /**
     * @param array|null $optionalParams
     * @return array|null
     */
    public function updateNote($id, $title, $content,$book,$usuario)
    {
        /**
         * @var Notes $note
         */
        $note = $this->entityManager->getRepository(Notes::class)->findOneBy(array('id' => $id));

        $note->setTitulo($title);
        $note->setDescripcion($content);
        $note->setUltimaModificacion(new DateTime());

        if ($book!== ""){
            $note->setBook($book);
        }
        if ($usuario!= ""){
            $note->setUsuario($usuario);
        }
        try {
            //$this->entityManager->merge($note);
            $this->entityManager->flush();
        } catch (ORMException $e) {
            return null;
        }

        return $note->getArray();
    }

    /**
     * @return null
     * @throws ORMException
     */
    public function updateNoteTag($id, $tag)
    {
        /**
         * @var Notes $note
         */
        $note = $this->entityManager->getRepository(Notes::class)->findOneBy(array('id' => $id));

        if (empty($note)) {
            return 204;
        } else {
            if (is_null($note->getTag1())) {
                $note->setTag1($tag);
                $this->entityManager->flush();
                return 200;
            } elseif (is_null($note->getTag2())) {
                $note->setTag2($tag);
                $this->entityManager->flush();
                return 200;
            } elseif (is_null($note->getTag3())) {
                $note->setTag3($tag);
                $this->entityManager->flush();
                return 200;
            } elseif (is_null($note->getTag4())) {
                $note->setTag4($tag);
                $this->entityManager->flush();
                return 200;
            } else {
                return 400;
            }
        }
    }

    /**
     * @return array|null
     * @throws ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function removeTagOnOne($id, $tag)
    {
        /** @var Notes $note */
        $note = $this->entityManager->getRepository(Notes::class)->findOneBy(array('id' => $id));

        if ($note->getTag1() == $tag) {
            $note->setTag1(null);
            $this->entityManager->flush();
        } elseif ($note->getTag2() == $tag) {
            $note->setTag2(null);
            $this->entityManager->flush();
        } elseif ($note->getTag3() == $tag) {
            $note->setTag3(null);
            $this->entityManager->flush();
        } elseif ($note->getTag4() == $tag) {
            $note->setTag4(null);
            $this->entityManager->flush();
        } else {
            return null;
        }

        return $note->getArray();
    }

    /**
     * @return array|null
     */
    public function changePrivateById($id)
    {
        /**
         * @var Notes $note
         */
        $note = $this->entityManager->getRepository(Notes::class)->findOneBy(array('id' => $id));

        if ($note != null) {
            $note->setPrivada(!$note->isPrivada());
        } else {
            return null;
        }

        try {
            $this->entityManager->merge($note);
            $this->entityManager->flush();
        } catch (ORMException $e) {
            return null;
        }

        return $note->getArray();
    }

}