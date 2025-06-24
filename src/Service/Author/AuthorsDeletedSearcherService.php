<?php 

namespace Src\Service\Author;

use Src\Entity\Author\Author;
use Src\Infrastructure\Repository\Author\AuthorRepository;

final readonly class AuthorsDeletedSearcherService {
    private AuthorRepository $repository;

    public function __construct() {
        $this->repository = new AuthorRepository();
    }

    /** @return Author[] */
    public function search(): array
    {
        return $this->repository->searchDeleted();
    }
}