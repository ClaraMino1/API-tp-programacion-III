<?php 

use Src\Utils\ControllerUtils;
use Src\Entity\Entry\Entry;
use Src\Service\Entry\EntryUpdateHandlerService;


final readonly class EntryPutController {

    private EntryUpdateHandlerService $handler;


    public function __construct() {
        $this->handler = new EntryUpdateHandlerService();
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