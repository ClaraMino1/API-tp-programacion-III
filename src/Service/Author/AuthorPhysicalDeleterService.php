<?php 

namespace Src\Service\Author;

use Src\Infrastructure\Repository\Author\AuthorRepository;

final readonly class AuthorPhysicalDeleterService {
    private AuthorRepository $repository;
    private AuthorDeletedFinderService $finder;

    public function __construct() {
        $this->repository = new AuthorRepository();
        $this->finder = new AuthorDeletedFinderService();
    }

    public function delete(int $id): void
    {
        $author = $this->finder->find($id);

        $this->repository->delete($author);
    } 
}