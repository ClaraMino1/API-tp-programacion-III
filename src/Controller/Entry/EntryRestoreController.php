<?php

use Src\Service\Entry\EntryRestoreService;

final readonly class EntryRestoreController {
    private EntryRestoreService $service;

    public function __construct() {
        $this->service = new EntryRestoreService();
    }

    public function start(int $id): void
    {
        $this->service->restore($id);
    }
}
