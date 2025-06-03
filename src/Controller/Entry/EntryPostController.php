<?php

use Src\Utils\ControllerUtils;
use Src\Service\Entry\EntryCreatorService;
use Src\Service\EntryLogs\EntryLogsCreatorService;

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
        $creation_date = ControllerUtils::getPost("creation_date");

        $creation_date = new DateTime($creation_date);


        $this->service->create($id_author, $title, $text, $creation_date);
        //llama al servicio y le pasa los datos obtenidos del body

        $this->serviceLogs->create();//faltan parametros
    }
}