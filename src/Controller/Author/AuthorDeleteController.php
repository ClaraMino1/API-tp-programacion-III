<?php 

use Src\Service\Author\AuthorDeleterService;

final readonly class AuthorDeleteController {
    private AuthorDeleterService $service;

    public function __construct() {
        $this->service = new AuthorDeleterService();
    }

    public function start(int $id): void
    {
        $this->service->delete($id);
    }
}