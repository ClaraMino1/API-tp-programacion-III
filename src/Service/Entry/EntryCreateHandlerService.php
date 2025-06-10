<?php 

namespace Src\Service\Entry;

use Src\Service\Entry\EntryCreatorService;
use Src\Service\EntryLogs\EntryLogsCreatorService;
use Src\Entity\EntryLogs\EntryLogs;

final class EntryCreateHandlerService {

    private EntryCreatorService $entryCreatorService;
    private EntryLogsCreatorService $entryLogsCreatorService;

    public function __construct() {
        $this->entryCreatorService = new EntryCreatorService();
        $this->entryLogsCreatorService = new EntryLogsCreatorService();

    }

    public function handle(int $id_author, string $title, string $text):void
    {
        //crea la entrada
        $entry = $this->entryCreatorService->create($id_author, $title, $text);

        //crear log de actualizacion
        $description = "El autor con el id: " . $id_author . " ha creado una entrada";

        $this->entryLogsCreatorService->create($entry->id(),$description);
    }
}