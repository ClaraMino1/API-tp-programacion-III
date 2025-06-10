<?php 

namespace Src\Entity\Entry\Exception;

use Exception;

final class EntryNotFoundException extends Exception {
    public function __construct(int $id) {
        parent::__construct("No se encontro el articulo correspondiente. Id: ".$id);
    }
}