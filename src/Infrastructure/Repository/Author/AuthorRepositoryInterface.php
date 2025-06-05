<?php 

namespace Src\Infrastructure\Repository\Author;

use Src\Entity\Author\Author;

interface AuthorRepositoryInterface {

    public function find(int $id): ?Author;

    /** @return Author[] */
    public function search(): array;

    public function insert(Author $author): void;

    public function update(Author $author): void;

    //public function delete(Author $author): void;
}