<?php 

//namespace Src\Controller\Entry;

use Src\Utils\ControllerUtils;

use Src\Entity\Entry\Entry;
use Src\Service\Handler\UpdateHandler;





final readonly class EntryPutController {

    private UpdateHandler $handler;


    public function __construct() {
        
        $this->handler = new UpdateHandler();

    }

    public function start(int $id): void //se crea el metodo start que recibe un id
    {
        //ControllerUtils::getPost(): Recupera datos del cuerpo de la solicitud
        $id_author = ControllerUtils::getPost("id_author");
        $title = ControllerUtils::getPost("title");
        $text = ControllerUtils::getPost("text");
        //$creation_date = ControllerUtils::getPost("creation_date");



        //llamar al handler
        $this->handler->handle($id_author, $title, $text,$id);        
        //$this->service->update($id_author, $title, $text,$id);
        
        
    //    $description = "El autor con el id: " . $id_author . " ha actualizado una entrada";

    //     $this->serviceLogs->create($id,$creation_date,$description);
    }

}