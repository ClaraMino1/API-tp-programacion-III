<?php 

use Src\Service\Entry\EntryFinderService;

final readonly class EntryGetController {

    private EntryFinderService $service;

    public function __construct() {
        $this->service = new EntryFinderService();
    }

    public function start(int $id): void
    {
        $entry = $this->service->find($id);
        
        echo json_encode([
            "id" => $entry->id(),
            "id_author" => $entry->id_author(),
            "title" => $entry->title(),
            "text" => $entry->text(),
            "creation_date" => $entry->creation_date()->format("Y-m-d H:i:s"),
            "deleted" => $entry->deleted()


        ]);
    }
}