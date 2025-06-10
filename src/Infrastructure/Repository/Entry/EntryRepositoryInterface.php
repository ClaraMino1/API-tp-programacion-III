<?php 

namespace Src\Infrastructure\Repository\Entry;

use Src\Entity\Entry\Entry; //La interfaz depende de la entidad Entry

/*implements EntryRepositoryInterface:

Obliga a la clase a implementar todos los métodos definidos en la interfaz

Garantiza que el repositorio cumpla con el contrato establecido */

interface EntryRepositoryInterface {

    /*FIND AN ENTRY */
    public function find(int $id): ?Entry; //retorna un objeto Entry o null

    /*SEARCH ENTRIES */
    /** @return Article[] */
    public function search(): array;

    /*CREATE AN ENTRY */
    public function insert(Entry $entry): Entry;

    /*UPDATE  OR DELETE AN ENTRY */
    public function update(Entry $entry): int;


}