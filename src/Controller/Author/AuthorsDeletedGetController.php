<?php 

use Src\Service\Author\AuthorsDeletedSearcherService;

final readonly class AuthorsDeletedGetController {
    private AuthorsDeletedSearcherService $service;

    public function __construct() {
        $this->service = new AuthorsDeletedSearcherService();
    }

    public function start(): void
    {
        $authors = $this->service->search();
        echo json_encode($this->toResponse($authors));
    }

    private function toResponse(array $authors): array 
    {
        $responses = [];
        
        foreach($authors as $author) {
            $responses[] = [
                "id" => $author->id(),
                "name" => $author->name(),
                "email" => $author->email()
            ];
        }

        return $responses;
    }
}