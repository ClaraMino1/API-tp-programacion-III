<?php 

namespace Src\Entity\EntryLogs\Exception;

use Exception;

final class EntryLogsNotFoundException extends Exception {
    public function __construct(int $id) {
        parent::__construct("No se encontro el log correspondiente. Id: ".$id);
    }
}