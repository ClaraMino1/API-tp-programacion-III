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
                            entries A
                        WHERE
                            A.id = :id
                        AND
                            A.deleted = 0
                    HEREDOC;

        $parameters = [
            "id" => $id,
        ];

        $result = $this->execute($query, $parameters);

        return $this->toEntry($result[0] ?? null);
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