<?php 

use Src\Service\Article\ArticleFinderService;

final readonly class ArticleGetController {

    private ArticleFinderService $service;

    public function __construct() {
        $this->service = new ArticleFinderService();
    }

    public function start(int $id): void
    {
        $article = $this->service->find($id);
        
        echo json_encode([
            "id" => $article->id(),
            "category_id" => $article->category_id(),
            "title" => $article->title(),
            "description" => $article->description(),
            "image_url" => $article->image_url(),
            "date" => $article->date()->format("Y-m-d H:i:s"),
            "deleted" => $article->deleted()


        ]);
    }
}