<?php 

namespace Src\Service\Handler;
use DateTime;

use Src\Service\Entry\EntryUpdaterService;
use Src\Service\EntryLogs\EntryLogsCreatorService;
use Src\Entity\EntryLogs\EntryLogs;





final class UpdateHandler{

    private EntryUpdaterService $entryUpdaterService;
    private EntryLogsCreatorService $entryLogsCreatorService;

    public function __construct() {
        $this->entryUpdaterService = new EntryUpdaterService();
        $this->entryLogsCreatorService = new EntryLogsCreatorService();

    }


    public function handle(int $id_author, string $title, string $text, int $id):void{

        //actualizar la entrada
        $entry = $this->entryUpdaterService->update($id_author, $title, $text,$id);

        //crear log de actualizacion
        $description = "El autor con el id: " . $id_author . " ha actualizado una entrada";

        $creation_date = new DateTime('now'); //hora actual

        $this->entryLogsCreatorService->create($id,$creation_date,$description);

    }


    
}