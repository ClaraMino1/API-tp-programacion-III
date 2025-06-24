<?php 

use Src\Service\Entry\EntriesDeletedSearcherService;

final readonly class EntriesDeletedGetController {
    private EntriesDeletedSearcherService $service;

    public function __construct() {
        $this->service = new EntriesDeletedSearcherService();
    }

    public function start(): void
    {
        $entries = $this->service->search();
        echo json_encode($this->toResponse($entries));
    }

    private function toResponse(array $entries): array 
    {
        $responses = [];
        
        foreach($entries as $entry) {
            $responses[] = [
                "id" => $entry->id(),
                "id_author" => $entry->id_author(),
                "title" => $entry->title(),
                "text" => $entry->text(),
                "creation_date" => $entry->creation_date()->format("Y-m-d H:i:s"),
                "deleted" => $entry->isDeleted()
            ];
        }

        return $responses;
    }
}