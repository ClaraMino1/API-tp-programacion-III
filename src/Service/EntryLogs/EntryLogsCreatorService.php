<?php 

namespace Src\Service\EntryLogs;

use Src\Entity\EntryLogs\EntryLogs;
use Src\Infrastructure\Repository\EntryLogs\EntryLogsRepository;
use DateTime;

final readonly class EntryLogsCreatorService {
    private EntryLogsRepository $repository;

    public function __construct() {
        $this->repository = new EntryLogsRepository();
    }

    public function create(int $id_entry, DateTime $creation_date, string $description): void
    {
        $entryLogs = EntryLogs::create($id_entry, $creation_date, $description);
        $this->repository->create($entryLogs);
    }
}