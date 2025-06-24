<?php

use Src\Service\Author\AuthorRestoreService;

final readonly class AuthorRestoreController {
    private AuthorRestoreService $service;

    public function __construct() {
        $this->service = new AuthorRestoreService();
    }

    public function start(int $id): void
    {
        $this->service->restore($id);
    }
}
