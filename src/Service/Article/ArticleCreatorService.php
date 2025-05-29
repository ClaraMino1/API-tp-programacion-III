<?php 

namespace Src\Service\Article;

use Src\Entity\Article\Article;
use Src\Infrastructure\Repository\Article\ArticleRepository;
use DateTime;

final readonly class ArticleCreatorService {
    private ArticleRepository $repository;

    public function __construct() {
        $this->repository = new ArticleRepository();
    }

    public function create(string $category_id, string $title, string $description, string $image_url, DateTime $date): void
    {
        $article = Article::create($category_id, $title, $description, $image_url, $date);
        $this->repository->insert($article);
    }
}