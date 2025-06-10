<?php

use Src\Utils\ControllerUtils;
use Src\Entity\Entry\Entry;
use Src\Service\Entry\EntryCreateHandlerService;

final readonly class EntryPostController {

    private EntryCreateHandlerService $handler;

    public function __construct() {
        $this->handler = new EntryCreateHandlerService();
    }

    public function start(): void{//para crear una entry no se pasa parametros por url sino por el body

        //ControllerUtils::getPost(): Recupera datos del body de la solicitud

        $id_author = ControllerUtils::getPost("id_author");
        $title = ControllerUtils::getPost("title");
        $text = ControllerUtils::getPost("text");

        $this->handler->handle($id_author, $title, $text); 
    }
}