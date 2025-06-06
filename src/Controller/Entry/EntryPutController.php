<?php 


use Src\Utils\ControllerUtils;
use Src\Entity\Entry\Entry;

/*use Src\Service\Entry\EntryUpdaterService;
use Src\Service\EntryLogs\EntryLogsCreatorService;*/ //????

use Src\Service\EntryLogsPutPostHandler; //??




final readonly class EntryPutController {

    // private EntryUpdaterService $service;
    // private EntryLogsCreatorService $serviceLogs;

    private EntryLogsPutPostHandler $handler;


    public function __construct() {
        //$this->service = new EntryUpdaterService(); //se instancia el objeto
        //$this->serviceLogs = new EntryLogsCreatorService();

        $this->handler = new EntryLogsPutPostHandler();

    }

    public function start(int $id): void //se crea el metodo start que recibe un id
    {
        //ControllerUtils::getPost(): Recupera datos del cuerpo de la solicitud
        $id_author = ControllerUtils::getPost("id_author");
        $title = ControllerUtils::getPost("title");
        $text = ControllerUtils::getPost("text");
        //$creation_date = ControllerUtils::getPost("creation_date");

        $creation_date = new DateTime('now'); //hora actual


        //llamar al handler
        $this->handler->
        
        $this->service->update($id_author, $title, $text,$id);
        //se llama al metodo update del EntryUpdaterService
        
       $description = "El autor con el id: " . $id_author . " ha actualizado una entrada";

        $this->serviceLogs->create($id,$creation_date,$description);
    }

}
