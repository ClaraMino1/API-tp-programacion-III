<?php 

use Src\Service\Author\AuthorsSearcherService;

final readonly class AuthorsGetController {
    private AuthorsSearcherService $service;

    public function __construct() {
        $this->service = new AuthorsSearcherService();
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
                "email" => $author->email(),
            //  "deleted" => $author->isDeleted()
            ];
        }

        return $responses;
    }
}