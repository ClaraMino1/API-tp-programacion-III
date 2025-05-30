<?php 

namespace Src\Service\Entry;

use Src\Entity\Entry\Entry;
use Src\Infrastructure\Repository\Entry\EntryRepository;
use Src\Entity\Entry\Exception\EntryNotFoundException;

final readonly class EntryFinderService {

    private EntryRepository $repository;

    public function __construct() {
        $this->repository = new EntryRepository();
    }

    public function find(int $id): Entry 
    {   
        $entry = $this->repository->find($id);

        if ($entry === null) {
            throw new ArticleNotFoundException($id);
        }

        return $entry;
    }
}