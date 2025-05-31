<?php 

namespace Src\Infrastructure\Repository\Entry;

use Src\Entity\Entry\Entry;

interface EntryRepositoryInterface {
    public function find(int $id): ?Entry;


    /** @return Article[] */
    public function search(): array;

   
}