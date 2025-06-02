<?php 

namespace Src\Infrastructure\Repository\EntryLogs;

use Src\Entity\EntryLogs\EntryLogs;

interface EntryLogsRepositoryInterface {
    public function find(int $id): ?EntryLogs;

    /** @return EntryLogs[] */
    public function search(): array;

    public function insert(EntryLogs $entryLogs): void;

    //public function delete(EntryLogs $entryLogs): void;
}