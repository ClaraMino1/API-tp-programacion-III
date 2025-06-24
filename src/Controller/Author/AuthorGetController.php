<?php 

use Src\Service\Author\AuthorFinderService;

final readonly class AuthorGetController {

    private AuthorFinderService $service;

    public function __construct() {
        $this->service = new AuthorFinderService();
    }

    public function start(int $id): void
    {
        $author = $this->service->find($id);
        
        echo json_encode([
            "id" => $author->id(),
            "name" => $author->name(),
            "email" => $author->email()
        ]);
    }
}