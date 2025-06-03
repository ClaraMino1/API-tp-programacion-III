<?php 

namespace Src\Service\Entry;

use Src\Entity\Entry\Entry;
use Src\Infrastructure\Repository\Entry\EntryRepository;

final readonly class EntriesSearcherService {
    private EntryRepository $repository;

    public function __construct() {
        $this->repository = new EntryRepository();
    }

    /** @return Entry[] */
    public function search(): array
    {
        return $this->repository->search();
    }
}