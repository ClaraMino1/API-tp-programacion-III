<?php 

namespace Src\Service\Author;

use Src\Entity\Author\Author;
use Src\Infrastructure\Repository\Author\AuthorRepository;

final readonly class AuthorUpdaterService {
    private AuthorRepository $repository;
    private AuthorFinderService $finder;

    public function __construct() {
        $this->repository = new AuthorRepository();
        $this->finder = new AuthorFinderService();
    }

    public function update(string $name, string $email, int $id): void
    {
        $author = $this->finder->find($id);

        $author->modify($name, $email);
        //Modify es un setter para todos 
        $this->repository->update($author);
    }
}