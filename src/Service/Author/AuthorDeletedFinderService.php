<?php 

namespace Src\Service\Author;

use Src\Entity\Author\Author;
use Src\Infrastructure\Repository\Author\AuthorRepository;
use Src\Entity\Author\Exception\AuthorNotFoundException;

final readonly class AuthorDeletedFinderService {

    private AuthorRepository $repository;

    public function __construct() {
        $this->repository = new AuthorRepository();
    }

    public function find(int $id): Author 
    {   
        $author = $this->repository->findDeleted($id);

        if ($author === null) {
            throw new AuthorNotFoundException($id, "No existe ningun autor eliminado con ese Id.");
        }

        return $author;
    }
}