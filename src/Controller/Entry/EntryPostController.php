<?php

use Src\Utils\ControllerUtils;
use Src\Service\Entry\EntryCreatorService;
use Src\Service\EntryLogs\EntryLogsCreatorService;
use Src\Entity\Entry\Entry;


final readonly class EntryPostController {
    private EntryCreatorService $service; //se crea el objeto EntryCreatorService
    private EntryLogsCreatorService $serviceLogs;
    

    public function __construct() {
        $this->service = new EntryCreatorService();//se instancia el objeto
        $this->serviceLogs = new EntryLogsCreatorService();
        
    }

    public function start(): void{//para crear una entry no se pasa parametros por url sino por el body

        //ControllerUtils::getPost(): Recupera datos del body de la solicitud

        $id_author = ControllerUtils::getPost("id_author");
        $title = ControllerUtils::getPost("title");
        $text = ControllerUtils::getPost("text");
        
        $creation_date = new DateTime('now'); //hora actual



        $description = "creó ";

        $entry = $this->service->create($id_author, $title, $text, $creation_date);
        //llama al servicio y le pasa los datos obtenidos del body

        $this->serviceLogs->create($entry->id(),$creation_date,$description);
    }
}