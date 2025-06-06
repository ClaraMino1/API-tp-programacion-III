<?php 

use Src\Utils\ControllerUtils;
use Src\Entity\Entry\Entry;
use Src\Service\Handler\UpdateHandler;


final readonly class EntryPutController {

    private UpdateHandler $handler;


    public function __construct() {
        $this->handler = new UpdateHandler();
    }

    public function start(int $id): void
    {
        //ControllerUtils::getPost(): Recupera datos del cuerpo de la solicitud
        $id_author = ControllerUtils::getPost("id_author");
        $title = ControllerUtils::getPost("title");
        $text = ControllerUtils::getPost("text");
        
        $this->handler->handle($id_author, $title, $text,$id);        
     
    }

}