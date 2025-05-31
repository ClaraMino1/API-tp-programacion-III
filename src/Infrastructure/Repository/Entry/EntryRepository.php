<?php 

namespace Src\Infrastructure\Repository\Entry;

use Src\Infrastructure\PDO\PDOManager;
use Src\Entity\Entry\Entry;
use DateTime;

final readonly class EntryRepository extends PDOManager implements EntryRepositoryInterface {
   
   
    public function find(int $id): ?Entry
    {
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

        $result = $this->execute($query, $parameters);

        return $this->toEntry($result[0] ?? null);
    }

    /** @return Entry[] */
    public function search(): array
    {
        $query = <<<HEREDOC
                        SELECT
                            *
                        FROM
                            entries E
                        WHERE
                            E.deleted = 0
                    HEREDOC;
        
        $results = $this->execute($query);

        $entries = [];
        foreach($results as $result) {
            $entries[] = $this->toEntry($result);
        }

        return $entries;
    }

    public function insert(Entry $entry): void
    {
        $query = "INSERT INTO Entries (id_author, title, text, creation_date,deleted) VALUES (:id_author, :title, :text,:creation_date,:deleted) ";

        $parameters = [
            "id_author" => $entry->id_author(),
            "title" => $entry->title(),
            "text" => $entry->text(),
            "creation_date" => $entry->creation_date()->format("Y-m-d H:i:s"),
            "deleted" => $entry->isDeleted()

        ];

        $this->execute($query, $parameters);
    }

    public function update(Entry $entry): void
    {
        $query = <<<UPDATE_ARTICLE
                    UPDATE
                        entries
                    SET
                        id_author = :id_author,
                        title = :title,
                        text = :text,
                        creation_date = :creation_date,
                        deleted = :deleted
                    WHERE
                        id = :id
                UPDATE_ARTICLE;
        
        $parameters = [
            "id_author" => $entry->id_author(),
            "title" => $entry->title(),
            "text" => $entry->text(),
            "creation_date" => $entry->creation_date()->format("Y-m-d H:i:s"),
            "deleted" => $entry->isDeleted(),
            "id" => $entry->id(),
        ];

        $this->execute($query, $parameters);
    }

    



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