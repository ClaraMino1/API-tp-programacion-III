<?php 

namespace Src\Service\Entry;

use Src\Entity\Entry\Entry;
use Src\Infrastructure\Repository\Entry\EntryRepository;
use DateTime;

final readonly class EntryCreatorService {
    private EntryRepository $repository;

    public function __construct() {
        $this->repository = new EntryRepository();
    }

    public function create(int $id_author, string $title, string $text, DateTime $creation_date): void
    {
        $Entry = Entry::create($id_author, $title, $text, $creation_date);
        $this->repository->insert($Entry);
    }
}