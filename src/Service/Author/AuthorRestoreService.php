<?php

namespace Src\Service\Author;

use Src\Infrastructure\Repository\Author\AuthorRepository;
use Src\Entity\Author\Exception\AuthorNotFoundException;

final readonly class AuthorRestoreService {
    private AuthorRepository $repository;

    public function __construct() {
        $this->repository = new AuthorRepository();
    }

    public function restore(int $id): void
    {
        $author = $this->repository->findDeleted($id);

        if (!$author || !$author->isDeleted()) {
            throw new AuthorNotFoundException($id,"El autor no esta en papelera para restaurar.");
        }

        $this->repository->restore($author);
    }
}
