<?php 

namespace Src\Service\Entry;

use Src\Infrastructure\Repository\Entry\EntryRepository;

final readonly class EntryPhysicalDeleterService {
    private EntryRepository $repository;
    private EntryDeletedFinderService $finder;

    public function __construct() {
        $this->repository = new EntryRepository();
        $this->finder = new EntryDeletedFinderService();
    }

    public function delete(int $id): void
    {
        $entry = $this->finder->find($id);

        $this->repository->delete($entry);
    } 
}