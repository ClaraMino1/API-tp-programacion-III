<?php 

use Src\Service\Entry\EntryDeleterService;

final readonly class EntryDeleteController {
    private EntryDeleterService $service;

    public function __construct() {
        $this->service = new EntryDeleterService();
    }

    public function start(int $id): void
    {
        $this->service->delete($id);
    }
}