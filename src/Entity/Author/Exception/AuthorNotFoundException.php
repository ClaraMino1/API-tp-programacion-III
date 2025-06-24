<?php 

namespace Src\Entity\Author\Exception;

use Exception;

//modifique el metodo para que pueda mandar un mensaje personalizado
final class AuthorNotFoundException extends Exception {
    public function __construct(int $id, string $customMessage = "") {
        $message = $customMessage ?: "No se pudo encontrar el Autor correspondiente. Id: ".$id;
        parent::__construct($message);
    }
}