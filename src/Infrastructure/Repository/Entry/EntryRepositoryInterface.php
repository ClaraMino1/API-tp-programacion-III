<?php 

namespace Src\Infrastructure\Repository\Entry;

use Src\Entity\Entry\Entry;

interface EntryRepositoryInterface {

    public function insert(Entry $entry): Entry;

    public function delete(Entry $entry): void;

    public function update(Entry $entry): int;
    
    /** @return Entry[] */
    public function search(): array;

    /** @return Entry[] */
    public function searchDeleted(): array;

    public function find(int $id): ?Entry; //retorna un objeto Entry o null

    public function findDeleted(int $id): ?Entry;

    public function restore(Entry $entry): void;
}