<?php 

namespace Src\Infrastructure\Repository\Author;

use Src\Entity\Author\Author;

interface AuthorRepositoryInterface {
    
    public function insert(Author $author): void;//alta

    public function delete(Author $author): void;//baja

    public function update(Author $author): void;//modificacion
    
    /** @return Author[] */
    public function search(): array;

    /** @return Author[] */
    public function searchDeleted(): array;
    
    public function find(int $id): ?Author;

    public function findDeleted(int $id): ?Author;
    
    public function restore(Author $author): void;
}