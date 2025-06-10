<?php 

namespace Src\Service\Author;

use Src\Entity\Author\Author;
use Src\Infrastructure\Repository\Author\AuthorRepository;

final readonly class AuthorCreatorService {
    private AuthorRepository $repository;

    public function __construct() {
        $this->repository = new AuthorRepository();
    }

    public function create(string $name, string $email): void
    {
    //Utiliza el Create de Entity, luego Insert de Repository
        $author = Author::create($name, $email);
        $this->repository->insert($author);
    }
}