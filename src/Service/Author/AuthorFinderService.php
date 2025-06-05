<?php 

namespace Src\Service\Author;

use Src\Entity\Author\Author;
use Src\Infrastructure\Repository\Author\AuthorRepository;
use Src\Entity\Author\Exception\AuthorNotFoundException;

final readonly class AuthorFinderService {

    private AuthorRepository $repository;

    public function __construct() {
        $this->repository = new AuthorRepository();
    }

    public function find(int $id): Author 
    {   
        $author = $this->repository->find($id);

        if ($author === null) {
            throw new AuthorNotFoundException($id);
        }

        return $author;
    }
}