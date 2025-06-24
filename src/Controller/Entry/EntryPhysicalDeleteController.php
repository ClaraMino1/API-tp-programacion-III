<?php 

use Src\Service\Entry\EntryPhysicalDeleterService;

final readonly class EntryPhysicalDeleteController {
    private EntryPhysicalDeleterService $service;

    public function __construct() {
        $this->service = new EntryPhysicalDeleterService();
    }

    public function start(int $id): void
    {
        $this->service->delete($id);
    }
}