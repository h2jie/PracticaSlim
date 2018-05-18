<?php

namespace App\controllers;

use App\Repository\NoteRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Slim\Http\Request;
use Slim\Http\Response;


class NoteController
{

    private $noteRepository;

    /**
     * NotesAction constructor.
     * @param $noteRepository
     */
    public function __construct(NoteRepository $noteRepository)
    {
        $this->noteRepository = $noteRepository;
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function getRoute(Request $request, Response $response, array $args)
    {
        $mainPageToJson = $this->noteRepository->getRoutePage();
        return $response->withJson($mainPageToJson, 200);

    }


    public function getAll(Request $request, Response $response, array $args)
    {
        $optionalSort = $request->getParam('sort') ?: null;
        $notesToJson = $this->noteRepository->fetchAllNotes($optionalSort);

        if ($notesToJson['code'] == 200) {
            return $response->withJson($notesToJson, 200);
        } else {
            return $response->withJson($notesToJson, 204);
        }

    }


    public function getPublic(Request $request, Response $response, array $args)
    {
        $optionalSort = $request->getParam('sort') ?: null;
        $publicNotesToJson = $this->noteRepository->fetchAllPublic($optionalSort);

        if ($publicNotesToJson['code'] == 200) {
            return $response->withJson($publicNotesToJson, 200);
        } else {
            return $response->withJson($publicNotesToJson, 204);
        }

    }


    public function getOne(Request $request, Response $response, array $args)
    {
        $id = $request->getParam('id');
        if (!empty($id)){
            $data = $this->noteRepository->fetchOneById($id);

            if ($data['code'] == 200) {
                return $response->withJson($data, 200);
            } else {
                return $response->withJson($data, 204);
            }
        }else{
            $data = array('error' => 'Id field is empty');
            return $response->withJson($data,400);

        }
    }

    public function insert(Request $request, Response $response, array $args)
    {
        $body = $request->getParsedBody();
        $data = $this->noteRepository->insertNote($body);
        return $response->withJson($data, $data['code']);
    }


    public function remove(Request $request, Response $response, array $args)
    {
        //x-www-form-urlencoded to use Delete
        $id = $request->getParsedBody()['id'];

        $response = $this->noteRepository->removeNote($id);

        if ($response == 200) {
            $data = array('code' => $response, 'msg' => 'Note deleted');
            return $response->withJson($data, $response);
        } else {
            $data = array('code' => $response, 'msg' => 'Note could not be deleted');
            return $response->withJson($data, $response);
        }
    }


    public function getAllWithTag(Request $request, Response $response, array $args)
    {
        $tag = $request->getParam('tag');

        $arrResult = $this->noteRepository->fetchAllWithTag($tag);
        return $response->withJson($arrResult, $arrResult['code']);
    }




    public function addTagOnNote(Request $request, Response $response, array $args)
    {
        $body = $request->getParsedBody();
        $id = $body['id'];
        $tag = $body['tag'];

        try {
            $responseStatus = $this->noteRepository->updateNoteTag($id, $tag);
        } catch (ORMException $e) {
        }

        if ($responseStatus == 200) {
            $noteToJson = $this->noteRepository->fetchOneById($id);
            $arr = array('code' => $responseStatus, 'msg' => 'Note updated successfully', 'result' => $noteToJson);
            return $response->withJson($arr, $responseStatus);
        } else if ($responseStatus == 204) {
            $arr = array('code' => $responseStatus, 'msg' => 'No notes found');
            return $response->withJson($arr, $responseStatus);
        } else {
            $arr = array('code' => $responseStatus, 'msg' => 'The note has too much tags');
            return $response->withJson($arr, $responseStatus);
        }
    }


    public function deleteTagOnNote(Request $request, Response $response, array $args)
    {
        $responseStatus = $response->getStatusCode();
        $body = $request->getParsedBody();

        $id = $body['id'];
        $tag = $body['tag'];

        if ($responseStatus == 200) {
            try {
                $newNote = $this->noteRepository->removeTagOnOne($id, $tag);
            } catch (OptimisticLockException $e) {
            } catch (ORMException $e) {
            }
            if ($newNote != null) {
                $arr = array('code' => $responseStatus, 'msg' => 'Note updated successfully', 'note' => $newNote);
                return $response->withJson($arr, $responseStatus);
            } else {

                $arr = array('code' => $responseStatus, 'msg' => 'The tag ' . $tag . " does not exists in this note");
                return $response->withJson($arr, $responseStatus);
            }

        }
        $arr = array('code' => $responseStatus, 'msg' => 'No notes found');
        return $response->withJson($arr, $responseStatus);
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function updateNote(Request $request, Response $response, array $args)
    {
        $body = $request->getParsedBody();

        $id = $body['id'];
        $title = $body['titulo'];
        $content = $body['descripcion'];
        if (isset($body['book'])){
            $book = $body['book'];
        }else{
            $book = "";
        }

        if (isset($body['usuario'])){
            $usuario = $body['usuario'];
        }else{
            $usuario = "";
        }


        $newNote = $this->noteRepository->updateNote($id, $title, $content, $book, $usuario);

        if ($newNote != null) {
            $arr = array('code' => 200, 'msg' => 'Note updated', 'note' => $newNote);
            return $response->withJson($arr, 200);
        } else {
            $arr = array('code' => 409, 'msg' => 'Could not update note');
            return $response->withJson($arr, 409);
        }
    }



    /**
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function flipPrivate(Request $request, Response $response, array $args)
    {
        $data = $request->getParsedBody();

        $id = $data['id'];
        $newNote = $this->noteRepository->changePrivateById($id);

        if ($newNote != null) {
            $arr = array('code' => 200, 'msg' => 'Note private chaged correctly', 'note' => $newNote);
            return $response->withJson($arr, 200);
        } else {
            $arr = array('code' => 409, 'msg' => 'Could not update note');
            return $response->withJson($arr, 409);
        }
    }

}