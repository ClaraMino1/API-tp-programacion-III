<?php 

namespace Src\Entity\Entry\Exception;

use Exception;

final class EntryNotFoundException extends Exception {
    public function __construct(int $id, string $customMessage = "") {
        $message = $customMessage ?: "No se pudo encontrar la entrada correspondiente. Id: ".$id;
        parent::__construct($message);
    }
}