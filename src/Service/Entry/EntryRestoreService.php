<?php

namespace Src\Service\Entry;

use Src\Infrastructure\Repository\Entry\EntryRepository;
use Src\Entity\Entry\Exception\EntryNotFoundException;

final readonly class EntryRestoreService {
    private EntryRepository $repository;

    public function __construct() {
        $this->repository = new EntryRepository();
    }

    public function restore(int $id): void
    {
        $entry = $this->repository->findDeleted($id);

        if (!$entry || !$entry->isDeleted()) { //Si no encuentro la entrada (variable entry no existe), o si la entrada no está marcada como borrada (deleted = 0) lanzo una exepcion
            throw new EntryNotFoundException($id,"El autor no esta en papelera para restaurar.");
        }

        $this->repository->restore($entry);
    }
}
