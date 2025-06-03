<?php 

namespace Src\Infrastructure\Repository\Article;

use Src\Infrastructure\PDO\PDOManager;
use Src\Entity\Article\Article;
use DateTime;

final readonly class ArticleRepository extends PDOManager implements ArticleRepositoryInterface {
    public function find(int $id): ?Article
    {
        $query = <<<HEREDOC
                        SELECT 
                            *
                        FROM
                            article A
                        WHERE
                            A.id = :id
                        AND
                            A.deleted = 0
                    HEREDOC;

        $parameters = [
            "id" => $id,
        ];

        $result = $this->execute($query, $parameters);

        return $this->toArticle($result[0] ?? null);
    }

    /** @return Article[] */
    public function search(): array
    {
        $query = <<<HEREDOC
                        SELECT
                            *
                        FROM
                            article A
                        WHERE
                            A.deleted = 0
                    HEREDOC;
        
        $results = $this->execute($query);

        $articles = [];
        foreach($results as $result) {
            $articles[] = $this->toArticle($result);
        }

        return $articles;
    }

    public function update(Article $article): void
    {
        $query = <<<UPDATE_ARTICLE
                    UPDATE
                        Authors
                    SET
                        category_id = :category_id,
                        title = :title,
                        description = :description,
                        image_url = :image_url,
                        date = :date,
                        deleted = :deleted
                    WHERE
                        id = :id
                UPDATE_ARTICLE;
        
        $parameters = [
            "category_id" => $article->category_id(),
            "title" => $article->title(),
            "description" => $article->description(),
            "image_url" => $article->image_url(),
            "date" => $article->date()->format("Y-m-d H:i:s"),
            "deleted" => $article->deleted(),
            "id" => $article->id(),
        ];

        $this->execute($query, $parameters);
    }

    private function toArticle(?array $primitive): ?Article {
        if ($primitive === null) {
            return null;
        }

        return new Article(
            $primitive["id"],
            $primitive["category_id"],
            $primitive["title"],
            $primitive["description"],
            $primitive["image_url"],
            new DateTime($primitive["date"]),
            $primitive["deleted"]
        );
    }

    public function insert(Article $article): void
    {
        $query = "INSERT INTO Article (category_id, title, description ,image_url,date,deleted) VALUES (:category_id, :title, :description,:image_url, :date, :deleted) ";

        $parameters = [
            "category_id" => $article->category_id(),
            "title" => $article->title(),
            "description" => $article->description(),
            "image_url" => $article->image_url(),
            "date" => $article->date()->format("Y-m-d H:i:s"),
            "deleted" => $article->isDeleted()
        ];

        $this->execute($query, $parameters);
    }
}