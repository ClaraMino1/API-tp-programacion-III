<?php 

namespace Src\Infrastructure\Repository\Entry;

use Src\Entity\Entry\Entry;

interface EntryRepositoryInterface {

    /*FIND AN ENTRY */
    public function find(int $id): ?Entry;

    /*SEARCH ENTRIES */
    /** @return Article[] */
    public function search(): array;

    /*CREATE AN ENTRY */
    public function insert(Entry $entry): void;

    /*UPDATE AN ENTRY */
    public function update(Entry $entry): void;



   
}