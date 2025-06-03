<?php 

namespace Src\Service\Entry;

use Src\Entity\Entry\Entry;
use Src\Infrastructure\Repository\Entry\EntryRepository;
use DateTime;

final readonly class EntryUpdaterService {
    private EntryRepository $repository;
    private EntryFinderService $finder;

    public function __construct() {
        $this->repository = new EntryRepository();
        $this->finder = new EntryFinderService();
    }

    public function update(int $id_author, string $title, string $text, DateTime $creation_date, int $id): void
    {
        $entry = $this->finder->find($id);

        $entry->modify($id_author, $title, $text,$creation_date);
        

        $this->repository->update($entry);
    } 
}