<?php 

use Src\Utils\ControllerUtils;
use Src\Service\Article\ArticleUpdaterService;

final readonly class ArticlePutController {
    private ArticleUpdaterService $service;

    public function __construct() {
        $this->service = new ArticleUpdaterService();
    }

    public function start(int $id): void
    {
        $category_id = ControllerUtils::getPost("category_id");
        $title = ControllerUtils::getPost("title");
        $description = ControllerUtils::getPost("description");
        $image_url = ControllerUtils::getPost("image_url");
        $date = ControllerUtils::getPost("date");

        $date = new DateTime($date);
        

        $this->service->update($category_id, $title, $description, $image_url, $date,$id);
    }
}