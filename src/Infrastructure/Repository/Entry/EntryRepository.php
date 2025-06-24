<?php 

namespace Src\Infrastructure\Repository\Entry;

use Src\Infrastructure\PDO\PDOManager;
use Src\Entity\Entry\Entry;
use DateTime;

//actúa como intermediario entre la lógica de negocio y la base de datos
//HEREDOC: Sintaxis PHP para cadenas multilínea

//Los métodos de EntryRepository deben tener exactamente el mismo nombre y firma que los declarados en la interfaz EntryRepositoryInterface

//No existe un metodo delete porque se hace borrado logico actualizando el estado del atributo deleted, entonces se usa update


final readonly class EntryRepository extends PDOManager implements EntryRepositoryInterface {
    public function find(int $id): ?Entry //puede retornar un objeto Entry o null
    {
        //:id: Parámetro preparado para seguridad contra inyección SQL
        //WHERE E.deleted = 0: Asegura que solo se recuperen entradas activas (soft delete)
        $query = <<<HEREDOC
                        SELECT 
                            *
                        FROM
                            entries E
                        WHERE
                            E.id = :id
                        AND
                            E.deleted = 0
                    HEREDOC;

        $parameters = [
            "id" => $id,
        ];

        $result = $this->execute($query, $parameters);//Método heredado de PDOManager.Retorna un array asociativo con los resultados

        return $this->toEntry($result[0] ?? null);
        // Convierte el array de DB a objeto Entry
        //Si existe $result[0], lo usa, si no retorna null
    }

    public function findDeleted(int $id): ?Entry
    {
        $query = <<<FIND_DELETED_ENTRY
                        SELECT 
                            *
                        FROM
                            entries E
                        WHERE
                            E.id = :id
                        AND
                            E.deleted = 1
                    FIND_DELETED_ENTRY;

        $parameters = [
            "id" => $id,
        ];

        $result = $this->execute($query, $parameters);

        return $this->toEntry($result[0] ?? null);
    }

    /** @return Entry[] */
    public function search(): array{
    //WHERE E.deleted = 0: Asegura que solo se recuperen entradas activas (soft delete)

        $query = <<<HEREDOC
                        SELECT
                            *
                        FROM
                            entries E
                        WHERE
                            E.deleted = 0
                    HEREDOC;
        
        $results = $this->execute($query);//Método heredado de PDOManager.Retorna un array asociativo con los resultados

        $entries = [];
        foreach($results as $result) { //Convierte cada resultado en un objeto Entry
            $entries[] = $this->toEntry($result);
        }

        return $entries;
    }

    /** @return Entry[] */
    public function searchDeleted(): array
    {
        $query = <<<SEARCH_ENTRY
                        SELECT
                            *
                        FROM
                            entries E
                        WHERE
                            E.deleted = 1
                    SEARCH_ENTRY;
        
        $results = $this->execute($query);

        $entries = [];
        foreach($results as $result) {
            $entries[] = $this->toEntry($result);
        }

        return $entries;
    }

    //Recibe un objeto desde el servicio
    public function insert(Entry $entry): Entry
    {
        $query = "INSERT INTO Entries (id_author, title, text, creation_date, deleted) VALUES (:id_author, :title, :text, :creation_date, :deleted) ";

        $parameters = [//se pasan los datos del objeto instanciado con getters
            "id_author" => $entry->id_author(),
            "title" => $entry->title(),
            "text" => $entry->text(),
            "creation_date" => $entry->creation_date()->format("Y-m-d H:i:s"),
            "deleted" => $entry->isDeleted() //siempre va a ser 0 en entradas nuevas porque en ningun momento se llama a deleted() para cambiar el estado
        ];

        $this->execute($query, $parameters);//Método heredado de PDOManager.Retorna un array asociativo con los resultados
        
        return new Entry(
            (int) $this->lastInsertId(),
            $entry->id_author(),
            $entry->title(),
            $entry->text(),
            $entry->creation_date(),
            $entry->isDeleted()
        );
    }

    public function update(Entry $entry): int{
        //si se usó el metodo delete() de Entry, esto va a haber cambiado a true ->deleted = :deleted. si no siempre se mantiene en false

        $query = <<<UPDATE_ENTRY
                    UPDATE
                        entries
                    SET
                        id_author = :id_author,
                        title = :title,
                        text = :text,
                        deleted = :deleted
                    WHERE
                        id = :id
                UPDATE_ENTRY;
        
        $parameters = [//se pasan los datos de entry con getters
            "id_author" => $entry->id_author(),
            "title" => $entry->title(),
            "text" => $entry->text(),
            "deleted" => $entry->isDeleted(), // Se obtiene el estado actualizado y se pasa a la BD
            "id" => $entry->id(),
        ];

        $this->execute($query, $parameters);//Método heredado de PDOManager.Retorna un array asociativo con los resultados
        return (int)$this->lastInsertId();
        //BORRAR? poner void
    }

    public function delete(Entry $entry): void
    {
        $query = <<<DELETE_ENTRY
                        DELETE FROM entries
                        WHERE id = :id AND deleted = 1
                    DELETE_ENTRY;

        $parameters = [
            "id" => $entry->id()
        ];

        $this->execute($query, $parameters);
    }

    public function restore(Entry $entry): void
    {
        $query = <<<RESTORE_ENTRY
                        UPDATE entries
                        SET deleted = 0
                        WHERE id = :id AND deleted = 1
                    RESTORE_ENTRY;

        $parameters = [
            "id" => $entry->id()
        ];

        $this->execute($query, $parameters);
    }
    
    //Convierte arrays DB → Objetos Entry
    private function toEntry(?array $primitive): ?Entry {
        if ($primitive === null) {
            return null;
        }

        return new Entry(
            $primitive["id"],
            $primitive["id_author"],
            $primitive["title"],
            $primitive["text"],
            new DateTime($primitive["creation_date"]),
            $primitive["deleted"]
        );
    }
}