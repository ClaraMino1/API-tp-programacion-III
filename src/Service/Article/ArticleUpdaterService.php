<?php 

namespace Src\Service\Article;

use Src\Entity\Article\Article;
use Src\Infrastructure\Repository\Article\ArticleRepository;
use DateTime;

final readonly class ArticleUpdaterService {
    private ArticleRepository $repository;
    private ArticleFinderService $finder;

    public function __construct() {
        $this->repository = new ArticleRepository();
        $this->finder = new ArticleFinderService();
    }

    public function update(int $category_id, string $title, string $description, string $image_url, DateTime $date, int $id): void
    {
        $article = $this->finder->find($id);

        $article->modify($category_id, $title, $description, $image_url, $date);
        

        $this->repository->update($article);
    } 
}