<?php 

namespace Src\Infrastructure\Repository\EntryLogs;

use Src\Infrastructure\PDO\PDOManager;
use Src\Entity\EntryLogs\EntryLogs;
use DateTime;

final readonly class EntryLogsRepository extends PDOManager implements EntryLogsRepositoryInterface {
    public function find(int $id): ?EntryLogs
    {
        $query = <<<HEREDOC
                        SELECT 
                            *
                        FROM
                            EntryLogs E
                        WHERE
                            E.id = :id
                    HEREDOC;

        $parameters = [
            "id" => $id,
        ];

        $result = $this->execute($query, $parameters);

        return $this->toEntryLogs($result[0] ?? null);
    }

    /** @return EntryLogs[] */
    public function search(): array
    {
        $query = <<<HEREDOC
                        SELECT
                            *
                        FROM
                            EntryLogs E
                    HEREDOC;
        
        $results = $this->execute($query);

        $entrylogs = [];
        foreach($results as $result) {
            $entrylogs[] = $this->toEntryLogs($result);
        }

        return $entrylogs;
    }
    public function create(EntryLogs $entrylogs): void
    {
        $query = "INSERT INTO EntryLogs (id_entry, creation_date, description) VALUES (:id_entry, :creation_data, :description) ";

        $parameters = [
            "id_entry" => $entrylogs->id_entry(),
            "creation_date" => $entrylogs->creation_date()->format("Y-m-d H:i:s"),
            "description" => $entrylogs->description()
        ];

        $this->execute($query, $parameters);
    }

    private function toEntryLogs(?array $primitive): ?EntryLogs {
        if ($primitive === null) {
            return null;
        }

        return new EntryLogs(
            $primitive["id"],
            $primitive["id_entry"],
            new DateTime($primitive["creation_date"]),
            $primitive["description"]
        );
    }
}