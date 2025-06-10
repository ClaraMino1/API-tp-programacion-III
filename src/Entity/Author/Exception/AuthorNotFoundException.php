<?php 

namespace Src\Entity\Author\Exception;

use Exception;

final class AuthorNotFoundException extends Exception {
    public function __construct(int $id) {
        parent::__construct("No se encontro el Autor correspondiente. Id: ".$id);
    }
}