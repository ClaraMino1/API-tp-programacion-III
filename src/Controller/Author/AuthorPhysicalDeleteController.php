<?php 

use Src\Service\Author\AuthorPhysicalDeleterService;

final readonly class AuthorPhysicalDeleteController {
    private AuthorPhysicalDeleterService $service;

    public function __construct() {
        $this->service = new AuthorPhysicalDeleterService();
    }

    public function start(int $id): void
    {
        $this->service->delete($id);
    }
}