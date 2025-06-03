<?php 

namespace Src\Service\Entry;

use Src\Infrastructure\Repository\Entry\EntryRepository;

final readonly class EntryDeleterService {
    private EntryRepository $repository;
    private EntryFinderService $finder;

    public function __construct() {
        $this->repository = new EntryRepository();
        $this->finder = new EntryFinderService();
    }

    public function delete(int $id): void
    {
        $entry = $this->finder->find($id);

        $entry->delete();

        $this->repository->update($entry);
    } 
}