<?php 

namespace Src\Service\EntryLogs;

use Src\Entity\EntryLogs\EntryLogs;
use Src\Infrastructure\Repository\EntryLogs\EntryLogsRepository;
use Src\Entity\EntryLogs\Exception\EntryLogsNotFoundException;

final readonly class EntryLogsFinderService {

    private EntryLogsRepository $repository;

    public function __construct() {
        $this->repository = new EntryLogsRepository();
    }

    public function find(?int $id): array|EntryLogs  //acá find puede recibir un parametro opcional (entero/nulo). La función devuelve un array de EntryLogs o un solo EntryLogs
    {   
        if ($id === null) { //si el id es nulo, le pasamos todos los logsD
            $entryLogs = $this->repository->search(); 
            return $entryLogs; // Devuelve un array
        }

        // Si el id no es nulo, buscamos por el mismo
        $entryLog = $this->repository->find($id);

        if ($entryLog === null) {
            throw new EntryLogsNotFoundException($id);
        }

        return $entryLog;
    }
}