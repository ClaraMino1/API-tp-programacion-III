<?php 

namespace Src\Service\Entry;

use Src\Entity\Entry\Entry;
use Src\Infrastructure\Repository\Entry\EntryRepository;
use Src\Entity\Entry\Exception\EntryNotFoundException;

final readonly class EntryDeletedFinderService {

    private EntryRepository $repository;

    public function __construct() {
        $this->repository = new EntryRepository();
    }

    public function find(int $id): Entry 
    {   
        $entry = $this->repository->findDeleted($id);

        if ($entry === null) {
            throw new EntryNotFoundException($id, "No existe ninguna entrada eliminada con ese Id.");
        }

        return $entry;
    }
}