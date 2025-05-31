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