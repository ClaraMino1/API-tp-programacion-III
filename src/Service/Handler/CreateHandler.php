<?php 

namespace Src\Service\Handler;
use DateTime;

use Src\Service\Entry\EntryCreatorService;
use Src\Service\EntryLogs\EntryLogsCreatorService;
use Src\Entity\EntryLogs\EntryLogs;

final class CreateHandler{

    private EntryCreatorService $entryCreatorService;
    private EntryLogsCreatorService $entryLogsCreatorService;

    public function __construct() {
        $this->entryCreatorService = new EntryCreatorService();
        $this->entryLogsCreatorService = new EntryLogsCreatorService();

    }


    public function handle(int $id_author, string $title, string $text):void{

        $creation_date = new DateTime('now'); //hora actual

        //crea la entrada
        $entry = $this->entryCreatorService->create($id_author, $title, $text,$creation_date);

        //crear log de actualizacion
        $description = "El autor con el id: " . $id_author . " ha creado una entrada";

        

        $this->entryLogsCreatorService->create($entry->id(),$creation_date,$description);

    }


    
}