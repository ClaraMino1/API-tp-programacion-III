<?php 

namespace Src\Infrastructure\Repository\Author;

use Src\Infrastructure\PDO\PDOManager;
use Src\Entity\Author\Author;

final readonly class AuthorRepository extends PDOManager implements AuthorRepositoryInterface {
    public function find(int $id): ?Author
    {
        $query = <<<FIND_AUTHOR
                        SELECT 
                            *
                        FROM
                            Authors A
                        WHERE
                            A.id = :id
                        AND
                            A.deleted = 0
                    FIND_AUTHOR;
    // Query en Multiples Lineas
        //Mantener Alineado el  'FIND_AUTHOR'
            $parameters = [
                "id" => $id,
            ];

            $result = $this->execute($query, $parameters);

            return $this->toAuthor($result[0] ?? null);
    }

    /** @return Author[] */
    public function search(): array
    {
        $query = <<<SEARCH_AUTHOR
                        SELECT
                            *
                        FROM
                            Authors A
                        WHERE
                            A.deleted = 0
                    SEARCH_AUTHOR;
        
        $results = $this->execute($query);

        $authors = [];
        foreach($results as $result) {
            $authors[] = $this->toAuthor($result);
        }

        return $authors;
    }

    public function update(Author $author): void
    {
        $query = <<<UPDATE_AUTHOR
                    UPDATE
                        Authors
                    SET
                        name = :name,
                        email = :email,
                        deleted = :deleted
                    WHERE
                        id = :id
                    UPDATE_AUTHOR;
        
        $parameters = [
            "name" => $author->name(),
            "email" => $author->email(),
            "deleted"=>$author->isDeleted(),
            "id" => $author->id()
            
        ];

        $this->execute($query, $parameters);
    }


    
    public function insert(Author $author): void
    {
        $query = "INSERT INTO Authors (name, email, deleted) VALUES (:name, :email, :deleted) ";
        
        $parameters = [
            "name" => $author->name(),
            "email" => $author->email(),
            "deleted" => $author->isDeleted()
        ];

        $this->execute($query, $parameters);
    }
    private function toAuthor(?array $primitive): ?Author {
        if ($primitive === null) {
            return null;
        }

        return new Author(
            $primitive["id"],
            $primitive["name"],
            $primitive["email"],
            $primitive["deleted"]
        );
    }
}